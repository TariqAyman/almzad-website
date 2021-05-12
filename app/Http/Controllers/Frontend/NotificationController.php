<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\BuyAuctionNotification;
use App\Notifications\NewBidNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth('user')->user()->id;

        $notificationsPaginate = DatabaseNotification::query()
            ->where('notifiable_id', $userId)
            ->where('notifiable_type', User::class)
            ->orderBy('created_at', 'desc')
            ->paginate(setting('record_per_page'));

        $notifications = $notificationsPaginate->map(function ($notification) {
            if ($notification->type == NewBidNotification::class) {
                $auction = Auction::query()->where('id', $notification->data['auction']['id'])->firstOrFail();
                $notification->notification_type = 'newBid';

                $notification->note = trans('notification.newBid', [
                    'name' => $auction->name ?? $notification->data['auction']['name'],
                    'amount' => $notification->data['amount']
                ]);

                $notification->url = $notification->data['url'];
            } elseif ($notification->type == BuyAuctionNotification::class) {
                $auction = Auction::query()->where('id', $notification->data['auction']['id'])->firstOrFail();
                $notification->notification_type = 'buyAuction';

                $notification->note = trans('notification.buyAuction', [
                    'name' => $auction->name ?? $notification->data['auction']['name'],
                    'amount' => $notification->data['amount']
                ]);

                $notification->url = $notification->data['url'];
            }else{
                $wallet = Wallet::query()->where('id', $notification->data['wallet_id'])->firstOrFail();
                $notification->notification_type = 'wallet';

                $notification->note = trans('notification.wallet', [
                    'amount' => $notification->data['amount']
                ]);

                $notification->url = $notification->data['url'];
            }

            $notification->status = $notification->read_at ? trans('app.read') : trans('app.not_read');
            return $notification;
        });

        return view('frontend.user.notifications', compact('notifications', 'notificationsPaginate'));
    }

    public function markAsRead(Request $request)
    {
        auth('user')->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
}
