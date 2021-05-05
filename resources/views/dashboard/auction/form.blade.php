@extends('dashboard.layouts.contentLayoutMaster')

@if($edit)
    @section('page-title', trans('app.edit_auction'))
@section('page-heading', trans('app.edit_auction'))
@else
    @section('page-title', trans('app.add_auction'))
@section('page-heading', trans('app.add_auction'))
@endif

@section('page-style')
    <style>
        .thumb {
            max-width: 150px;
            max-height: 100px;
        }

        .img-wrap {
            max-width: 150px;
            max-height: 100px;

            position: relative;
        }

        .img-wrap .close {
            position: absolute;
            top: 2px;
            right: 2px;
            z-index: 100;
        }
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    @if($edit)
                        {!! Form::open(['route' => ['admin.auction.update',$auction->id], 'method' => 'PUT','files' => true, 'id' => 'auction-form']) !!}
                    @else
                        {!! Form::open(['route' => 'admin.auction.store', 'files' => true, 'id' => 'auction-form']) !!}
                    @endif
                    <h6 class="heading-small text-muted mb-4">@lang('app.auction information')</h6>

                    <div class="form-group row">
                        <div class="col-6">
                            <label class="col-form-label">@lang('app.types')</label>
                            <div class="col-sm-10">
                                {{ Form::select('type_id', $types, $edit ? $auction->type_id : null, [ 'class'=> 'selectpicker form-control', 'placeholder' => 'Select type...']) }}
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">@lang('app.categories')</label>
                            <div class="col-sm-10">
                                {{ Form::select('category_id', $categories, $edit ? $auction->category_id : null, [ 'class'=> 'selectpicker form-control', 'placeholder' => 'Select category...']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label class="col-form-label">@lang('app.users')</label>
                            <div class="col-sm-10">
                                {{ Form::select('user_id', $users, $edit ? $auction->type_id : null, [ 'class'=> 'selectpicker form-control', 'placeholder' => 'Select user...']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label class="col-form-label">@lang('app.name_en')</label>
                            <div class="col-sm-10">
                                {{ Form::text('name_en', $edit ? $auction->name_en : old('name_en'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">@lang('app.name_ar')</label>
                            <div class="col-sm-10">
                                {{ Form::text('name_ar', $edit ? $auction->name_ar : old('name_ar'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label class="col-form-label">@lang('app.description_ar')</label>
                            <div class="col-sm-10">
                                {{ Form::textarea('description_ar', $edit ? $auction->description_ar : old('description_ar'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">@lang('app.description_en')</label>
                            <div class="col-sm-10">
                                {{ Form::textarea('description_en', $edit ? $auction->description_en : old('description_en'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label class="col-form-label">@lang('app.conditions_ar')</label>
                            <div class="col-sm-10">
                                {{ Form::textarea('conditions_ar', $edit ? $auction->conditions_ar : old('conditions_ar'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">@lang('app.conditions_en')</label>
                            <div class="col-sm-10">
                                {{ Form::textarea('conditions_en', $edit ? $auction->conditions_en : old('conditions_en'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label class="col-form-label">@lang('app.start_from')</label>
                            <div class="col-sm-10">
                                {{ Form::number('start_from', $edit ? $auction->start_from : old('start_from'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">@lang('app.purchase_price')</label>
                            <div class="col-sm-10">
                                {{ Form::number('purchase_price', $edit ? $auction->purchase_price : old('purchase_price'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label class="col-form-label">@lang('app.start_date')</label>
                            <div class="col-sm-10">
                                {{ Form::date('start_date', $edit ? $auction->start_date : old('start_date'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">@lang('app.end_date')</label>
                            <div class="col-sm-10">
                                {{ Form::date('end_date', $edit ? $auction->end_date : old('end_date'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <div class="custom-control custom-checkbox">
                                {{ Form::checkbox('shipping', $edit ? $auction->shipping : 1, 1, ['id'=>"shipping",'class' => 'custom-control-input']) }}
                                {{ Form::label('shipping', trans('app.shipping'), ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="custom-control custom-checkbox">
                                {{ Form::checkbox('shipping_free', $edit ? $auction->shipping_free : 1, 1, ['id'=>"shipping_free",'class' => 'custom-control-input']) }}
                                {{ Form::label('shipping_free', trans('app.shipping_free'), ['class' => 'custom-control-label']) }}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="custom-control custom-checkbox">
                                {{ Form::checkbox('multi_auction', $edit ? $auction->multi_auction : 1, 1, ['id'=>"multi_auction",'class' => 'custom-control-input']) }}
                                {{ Form::label('multi_auction', trans('app.multi_auction'), ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label class="col-form-label">@lang('app.shipping_conditions_ar')</label>
                            <div class="col-sm-10">
                                {{ Form::textarea('shipping_conditions_ar', $edit ? $auction->shipping_conditions_ar : old('shipping_conditions_ar'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">@lang('app.shipping_conditions_en')</label>
                            <div class="col-sm-10">
                                {{ Form::textarea('shipping_conditions_en', $edit ? $auction->shipping_conditions_en : old('shipping_conditions_en'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>

                    @if($edit)
                        <div class="form-group col-6">
                            <label for="images">@lang('app.images')</label>
                            @if($auction->auctionsImages->count())
                                <br>
                                <div style="display:inline-block">
                                    @foreach($auction->auctionsImages as $image)
                                        <div style="display:inline-block" class="img-wrap"
                                             id="photo-wrap-{{$image->id}}">
                                            <button id="delete-image" onclick="removeImage({{$image->id}}); return false;" class="close">&times;</button>
                                            <img id="photo-img" class="thumb" src="{{ asset($image->image) }}" alt="photo">
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endif
                    <div class="form-group row">
                        <div class="col-12">
                            <label class="col-form-label">@lang('app.images')</label>
                            <div class="col-sm-10">
                                <input type="file" name="images[]" class="form-control" data-multiple-caption="{4} files selected" multiple accept="image/*">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                {{ Form::checkbox('status', $edit ? $auction->status : 1, 1, ['id'=>"status",'class' => 'custom-control-input']) }}
                                {{ Form::label('status', trans('app.status'), ['class' => 'custom-control-label']) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 ml-sm-auto">
                            @can('update-auction')
                                {{ Form::submit(trans('app.submit'), ['class'=> 'mt-5 btn btn-primary']) }}
                            @endcan
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @if($edit)
        @if($auction->is_sold)
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-5">
                        <div class="card-body p-0">

                            <div class="row">
                                <div class="col-md-7 col-lg-8 col-xl-9 col-12">
                                    <div class="card"><!----><!---->
                                        <div class="card-body"><!----><!---->
                                            <div class="row">
                                                <div class="d-flex justify-content-between flex-column col-xl-6 col-21">
                                                    <div class="d-flex justify-content-start"><span class="b-avatar badge-light-info rounded" style="width: 104px; height: 104px;"><span class="b-avatar-img"><img
                                                                    src="{{ asset($auction->soldTo->profile_photo) }}" alt="avatar"></span>
                                                        </span>
                                                        <div class="d-flex flex-column ml-1">
                                                            <div class="mb-1"><h4 class="mb-0"> {{ $auction->soldTo->first_name . ' ' . $auction->soldTo->last_name }} </h4><span class="card-text">{{ $auction->soldTo->phone_number }}</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-12">
                                                    <table class="mt-2 mt-xl-0 w-100">
                                                        <tr>
                                                            <th class="pb-50">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                     class="mr-75 feather feather-user">
                                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                                    <circle cx="12" cy="7" r="4"></circle>
                                                                </svg>
                                                                <span class="font-weight-bold">@lang('app.Username')</span></th>
                                                            <td class="pb-50"> {{ $auction->soldTo->username }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="pb-50">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                     class="mr-75 feather feather-check">
                                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                                </svg>
                                                                <span class="font-weight-bold">@lang('app.Status')</span></th>
                                                            <td class="pb-50 text-capitalize"> {{ $auction->soldTo->status ? 'مفعل' : 'معطل' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="pb-50">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                     class="mr-75 feather feather-flag">
                                                                    <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                                                                    <line x1="4" y1="22" x2="4" y2="15"></line>
                                                                </svg>
                                                                <span class="font-weight-bold">@lang('app.Address')</span></th>
                                                            <td class="pb-50"> {{ $auction->soldTo->address }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th class="pb-50">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                     class="mr-75 feather feather-flag">
                                                                    <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                                                                    <line x1="4" y1="22" x2="4" y2="15"></line>
                                                                </svg>
                                                                <span class="font-weight-bold">@lang('app.sale_amount')</span></th>
                                                            <td class="pb-50"> {{ $auction->purchase_price }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-5">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">@lang('app.auctions')</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="card-datatable table-responsive">
                            <table class="table table-striped table-bordered" id="auction-user-datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('app.name')</th>
                                    <th>@lang('app.phone')</th>
                                    <th>@lang('app.price')</th>
                                    <th>@lang('app.Created at')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($auction->auctionsUsers as $bid)
                                    <tr>
                                        <td>{{ $bid->id }}</td>
                                        <td>{{ $bid->user->first_name . ' ' . $bid->user->last_name }}</td>
                                        <td>{{ $bid->user->phone_number }}</td>
                                        <td><span class="ub-font">{{ $bid->price }}</span> @lang('app.currency')</td>
                                        <td class="ub-font">{{ $bid->created_at->locale(app()->getLocale())->format('Y/m/d H:s a') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-5">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">@lang('app.comments')</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="card-datatable table-responsive">
                            <table class="table table-striped table-bordered" id="auction-user-datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('app.name')</th>
                                    <th>@lang('app.comment')</th>
                                    <th>@lang('app.status')</th>
                                    <th>@lang('app.Created at')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($auction->comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->user->first_name . ' ' . $comment->user->last_name  }}</td>
                                        <td>{{ $comment->comment }}</td>
                                        <td style="width: 150px; background-color: {{ $comment->status ? 'green' : 'red' }}">
                                            <select id="changeStatus" class="form-control">
                                                <option data-id="{{ $comment->id }}" {{ $comment->status ? 'selected' : "" }}  value="1">
                                                    مفعل
                                                </option>
                                                <option data-id="{{ $comment->id }}" {{ $comment->status ? '' : "selected" }} value="0">
                                                    معطل
                                                </option>
                                            </select>
                                        </td>


                                        <td class="ub-font">{{ $comment->created_at->locale(app()->getLocale())->format('Y/m/d H:s a') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection


@section('page-script')
    <script>
        $(document).on('change', '#changeStatus', function (e) {
            e.preventDefault();
            var id = $(this).children().data('id');
            var status = $(this).children('option:selected').val();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: "POST",
                url: "{{route('admin.comments.changeStatus')}}",
                data: {id: id, status: status},
                success: function (data) {
                        window.location.href = "";
                }
            });
        });

        function removeImage(id) {
            let url = '{{route('admin.auction.remove-image',[$auction->id ?? 0, '#'])}}'
            url = url.replace('#', id);
            $.ajax({
                type: 'Delete',
                url: url,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                encode: true
            }).done(function (response) {
                $('#photo-wrap-' + id).remove();

            });
            return false;
        }
    </script>
@stop
