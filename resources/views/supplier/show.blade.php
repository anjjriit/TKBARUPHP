@extends('layouts.adminlte.master')

@section('title')
    @lang('supplier.show.title')
@endsection

@section('page_title')
    <span class="fa fa-building-o fa-fw"></span>&nbsp;@lang('supplier.show.page_title')
@endsection
@section('page_title_desc')
    @lang('supplier.show.page_title_desc')
@endsection

@section('custom_css')
    <style type="text/css">
        .control-label-normal {
            font-weight: 400;
            display:inline-block;
        }
    </style>
@endsection

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>@lang('labels.GENERAL_ERROR_TITLE')</strong> @lang('labels.GENERAL_ERROR_DESC')<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('supplier.show.header.title')</h3>
        </div>
        <form class="form-horizontal">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li><a href="#tab_supplier" data-toggle="tab">@lang('supplier.show.tab.supplier')</a></li>
                                <li><a href="#tab_pic" data-toggle="tab">@lang('supplier.show.tab.pic')</a></li>
                                <li><a href="#tab_bank_account" data-toggle="tab">@lang('supplier.show.tab.bank_account')</a></li>
                                <li><a href="#tab_product" data-toggle="tab">@lang('supplier.show.tab.product')</a></li>
                                <li><a href="#tab_settings" data-toggle="tab">@lang('supplier.show.tab.settings')</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_customer">
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">@lang('supplier.field.name')</label>
                                        <div class="col-sm-10">
                                            <label id="inputName" class="control-label">
                                                <span class="control-label-normal">{{ $supplier->name }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress" class="col-sm-2 control-label">@lang('supplier.field.address')</label>
                                        <div class="col-sm-10">
                                            <label id="inputAddress" class="control-label">
                                                <span class="control-label-normal">{{ $supplier->address }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCity" class="col-sm-2 control-label">@lang('supplier.field.city')</label>
                                        <div class="col-sm-10">
                                            <label id="inputCity" class="control-label">
                                                <span class="control-label-normal">{{ $supplier->city }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhone" class="col-sm-2 control-label">@lang('supplier.field.phone')</label>
                                        <div class="col-sm-10">
                                            <label id="inputPhone" class="control-label">
                                                <span class="control-label-normal">{{ $supplier->phone }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTaxId" class="col-sm-2 control-label">@lang('supplier.field.tax_id')</label>
                                        <div class="col-sm-10">
                                            <label id="inputTaxId" class="control-label">
                                                <span class="control-label-normal">{{ $supplier->tax_id }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputRemarks" class="col-sm-2 control-label">@lang('supplier.field.remarks')</label>
                                        <div class="col-sm-10">
                                            <label id="inputRemarks" class="control-label">
                                                <span class="control-label-normal">{{ $supplier->remarks }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_pic">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @foreach($supplier->getProfiles as $key => $profile)
                                                <div class="box box-widget">
                                                    <div class="box-header with-border">
                                                        <div class="user-block">
                                                            <strong>Person In Charge {{ $key + 1 }}</strong><br/>
                                                            &nbsp;&nbsp;&nbsp;{{ $profile->first_name }}&nbsp;{{ $profile->last_name }}
                                                        </div>
                                                        <div class="box-tools">
                                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="inputFirstName" class="col-sm-2 control-label">@lang('supplier.field.first_name')</label>
                                                            <div class="col-sm-10">
                                                                <label id="inputFirstName" class="control-label">
                                                                    <span class="control-label-normal">{{ $profile->first_name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputLastName" class="col-sm-2 control-label">@lang('supplier.field.last_name')</label>
                                                            <div class="col-sm-10">
                                                                <label id="inputLastName" class="control-label">
                                                                    <span class="control-label-normal">{{ $profile->last_name }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputAddress" class="col-sm-2 control-label">@lang('supplier.field.address')</label>
                                                            <div class="col-sm-10">
                                                                <label id="inputAddress" class="control-label">
                                                                    <span class="control-label-normal">{{ $profile->address }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputICNum" class="col-sm-2 control-label">@lang('supplier.field.ic_num')</label>
                                                            <div class="col-sm-10">
                                                                <label id="inputICNum" class="control-label">
                                                                    <span class="control-label-normal">{{ $profile->ic_num }}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputPhoneNumber" class="col-sm-2 control-label">@lang('supplier.field.phone_number')</label>
                                                            <div class="col-sm-10">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>@lang('supplier.show.table_phone.header.provider')</th>
                                                                        <th>@lang('supplier.show.table_phone.header.number')</th>
                                                                        <th>@lang('supplier.show.table_phone.header.remarks')</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($profile->getPhoneNumber as $phone)
                                                                        <tr>
                                                                            <td>{{ $phone->getProvider->name }}</td>
                                                                            <td>{{ $phone->number }}</td>
                                                                            <td>{{ $phone->remarks }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_bank_account">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center">@lang('supplier.show.table_bank.header.bank')</th>
                                            <th class="text-center">@lang('supplier.show.table_bank.header.account_number')</th>
                                            <th class="text-center">@lang('supplier.show.table_bank.header.remarks')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($supplier->getBankAccount as $ba)
                                            <tr>
                                                <td>{{ $ba->getBank->name }}&nbsp;({{ $ba->getBank->name }})</td>
                                                <td>{{ $ba->account_number }}</td>
                                                <td>{{ $ba->remarks }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab_settings">
                                    <div class="form-group">
                                        <label for="inputPaymentDueDay" class="col-sm-2 control-label">@lang('supplier.field.payment_due_day')</label>
                                        <div class="col-sm-10">
                                            <label id="inputPaymentDueDay" class="control-label">
                                                <span class="control-label-normal">{{ $supplier->payment_due_day }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-2">
                        <a href="{{ route('db.master.supplier') }}" class="btn btn-default">@lang('buttons.back_button')</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection