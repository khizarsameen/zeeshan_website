@extends('adminlte::page')
@section('css')
    <style>
        .dataTables_wrapper tbody {
            background-color: #f2f2f2;
            /* Light grey color */
        }
    </style>
@endsection
@section('content')
    <div class="clearfix">&nbsp;</div>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">{{ __('Manage Customer Orders') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <label for="" class="col-form-label col-md-2">Contact</label>
                            <div class="col-md-4">
                                <input type="text" name="contact" id="contact" placeholder="Email or Phone No"
                                    value="{{ $order->contact }}" readonly class="form-control">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 d-flex flex-column ">


                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <label for="" class="col-form-label font-weight-bold"
                                            style="font-size: 24px !important;">Delivery</label>
                                        <div class="select-wrap">
                                            <label class="mb-0">Country/Region</label>
                                            <select name="ship_region" id="ship_region" class="form-control" disabled>
                                                <option value="UK">United Kingdom</option>
                                            </select>
                                        </div>
                                        <div class="invalid-feedback ship_region">

                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="" class="col-form-label">First Name</label>
                                        <input type="text" name="ship_firstname" id="ship_firstname" class="form-control"
                                            placeholder="First Name" readonly value="{{ $order->ship_firstname }}">
                                        <div class="invalid-feedback ship_firstname">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="col-form-label">Last Name</label>

                                        <input type="text" name="ship_lastname" id="ship_lastname" class="form-control"
                                            placeholder="Last Name" readonly value="{{ $order->ship_lastname }}">
                                        <div class="invalid-feedback ship_lastname">

                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">

                                    <div class="col-md-12">
                                        <label for="" class="col-form-label">Address</label>
                                        <input type="text" name="ship_address" id="ship_address" class="form-control"
                                            placeholder="Address" value="{{ $order->ship_address }}" readonly>
                                        <div class="invalid-feedback ship_address">

                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="" class="col-form-label">City</label>

                                        <input type="text" name="ship_city" id="ship_city" class="form-control"
                                            placeholder="City" readonly value="{{ $order->ship_city }}">
                                        <div class="invalid-feedback ship_city">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="col-form-label">Postal</label>

                                        <input type="text" name="ship_postalcode" id="ship_postalcode"
                                            class="form-control" placeholder="Postal Code" readonly
                                            value="{{ $order->ship_postalcode }}">
                                        <div class="invalid-feedback ship_postalcode">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="" class="col-form-label">Phone</label>

                                        <input type="text" name="ship_phone" id="ship_phone" class="form-control"
                                            placeholder="Phone" readonly value="{{ $order->ship_phone }}">
                                        <div class="invalid-feedback ship_phone">

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-5 d-flex flex-column offset-md-1 ">


                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <label for="" class="col-form-label font-weight-bold"
                                            style="font-size: 24px !important;">Billing</label>
                                        <div class="select-wrap">
                                            <label class="mb-0">Country/Region</label>
                                            <select name="bill_region" id="bill_region" class="form-control" disabled>
                                                <option value="UK">United Kingdom</option>
                                            </select>
                                        </div>
                                        <div class="invalid-feedback ship_region">

                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="" class="col-form-label">First Name</label>
                                        <input type="text" name="bill_firstname" id="bill_firstname" class="form-control"
                                            placeholder="First Name" readonly value="{{ $order->bill_firstname }}">
                                        <div class="invalid-feedback bill_firstname">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="col-form-label">Last Name</label>

                                        <input type="text" name="bill_lastname" id="bill_lastname" class="form-control"
                                            placeholder="Last Name" readonly value="{{ $order->bill_lastname }}">
                                        <div class="invalid-feedback bill_lastname">

                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">

                                    <div class="col-md-12">
                                        <label for="" class="col-form-label">Address</label>
                                        <input type="text" name="bill_address" id="bill_address" class="form-control"
                                            placeholder="Address" value="{{ $order->bill_address }}" readonly>
                                        <div class="invalid-feedback bill_address">

                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label for="" class="col-form-label">City</label>

                                        <input type="text" name="bill_city" id="bill_city" class="form-control"
                                            placeholder="City" readonly value="{{ $order->bill_city }}">
                                        <div class="invalid-feedback bill_city">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="col-form-label">Postal</label>

                                        <input type="text" name="bill_postalcode" id="bill_postalcode"
                                            class="form-control" placeholder="Postal Code" readonly
                                            value="{{ $order->bill_postalcode }}">
                                        <div class="invalid-feedback bill_postalcode">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="" class="col-form-label">Phone</label>

                                        <input type="text" name="bill_phone" id="bill_phone" class="form-control"
                                            placeholder="Phone" readonly value="{{ $order->bill_phone }}">
                                        <div class="invalid-feedback bill_phone">

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <h4 class="font-weight-bold mt-2">Order Items</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-sm" id="itemsTable" style="width: 100%;">
                                    <thead style="border: none !important;">
                                        <tr>
                                            <th style="width: 40%;">Item</th>
                                            <th style="width: 10%;">Qty</th>
                                            <th style="width: 20%;">ِAmount</th>
                                            <th style="width: 30%;">View</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_items as $oitem)
                                            <tr>
                                                <td>{{ $oitem->title }}</td>
                                                <td>{{ $oitem->qty }}</td>
                                                <td>{{ $oitem->amount }}</td>
                                                <?php $image = asset("product/$oitem->image_url"); ?>
                                                <td><a href="{{ $image }}" class="btn btn-success" target="_BLANK">Click Here to view Image</a>
                                                </td>
                                            </tr>
                                            
                                        @endforeach
                
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="1" class="font-weight-bold">Total</td>
                                            <td class="totalCol font-weight-bold"></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
        @section('js')
            <script>
                var ordersTable;
                $(document).ready(function() {
                    $('#itemsTable').DataTable();
                });
            </script>
        @endsection
