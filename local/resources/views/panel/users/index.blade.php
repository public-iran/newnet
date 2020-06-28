@extends('panel.layout.master')



@section('content')

    <div class="row">

        <div class="col s12">
            <div class="card">

                <div class="card-header blue padding-1 white-text center-align">فرم ثبت اطلاعات</div>

                <div class="card-content">

                    <div class="padding-1 border-bottom-2px my-blue-text">سال و منطقه</div>
                    <div class="row">

                        <div class="col s12 m4 l4">
                            <div class="input-field">
                                <select>
                                    <option value="" disabled selected>انتخاب سال مالی</option>
                                    <option value="1">گزینه 1</option>
                                    <option value="2">گزینه 2</option>
                                    <option value="3">گزینه 3</option>
                                </select>
                            </div>
                        </div>

                        <div class="col s12 m4 l4">
                            <div class="input-field">
                                <input  id="newcode" type="number" class="validate">
                                <label for="newcode">کد نوسازی</label>
                            </div>
                        </div>

                        <div class="col s12 m4 l4">
                            <div class="input-field">
                                <input disabled id="shm" type="text" class="validate" value="منطقه 2">
                                <!--                        <label for="shm">شهرداری منطقه</label>-->
                            </div>
                        </div>


                    </div>

                    <div class="padding-1 border-bottom-2px my-blue-text">آدرس و شماره تماس</div>
                    <div class="row center-align">

                        <div class="col s6 m6 l2">
                            <div class="input-field">
                                <select>
                                    <option value="" disabled selected>انتخاب خیابان</option>
                                    <option value="1">گزینه 1</option>
                                    <option value="2">گزینه 2</option>
                                    <option value="3">گزینه 3</option>
                                </select>
                            </div>
                        </div>

                        <div class="col s6 m6 l4">
                            <div class="input-field col s12">
                                <textarea id="address" class="materialize-textarea"></textarea>
                                <label class="rtl" for="address">آدرس کامل و توضیحات</label>
                            </div>
                        </div>

                        <div class="col s6 m6 l2">
                            <div class="input-field">
                                <input  id="telshop" type="number" class="validate">
                                <label for="telshop">شماره همراه مغازه دار</label>
                            </div>
                        </div>

                        <div class="col s6 m6 l2">
                            <div class="input-field">
                                <input  id="teladminshop" type="number" class="validate">
                                <label for="teladminshop">شماره همراه صاحب ملک</label>
                            </div>
                        </div>

                        <div class="col s12 m12 l2">
                            <div class="input-field">
                                <input  id="phoneadminshop" type="number" class="validate">
                                <label for="phoneadminshop">شماره ثابت صاحب ملک</label>
                            </div>
                        </div>

                    </div>


                    <div class="padding-1 border-bottom-2px my-blue-text">مشخصات و قیمت</div>
                    <div class="row center-align">

                        <div class="col s6 m6 l3">
                            <div class="input-field col s12">
                                <input type="text" id="autocomplete-input" class="autocomplete">
                                <label for="autocomplete-input">نام برند</label>
                            </div>
                        </div>

                        <div class="col s6 m6 l3">
                            <div class="input-field">
                                <input  id="namenamayadegi" type="text" class="validate">
                                <label for="namenamayadegi">نام نمایندگی</label>
                            </div>
                        </div>

                        <div class="col s12 m12 l6">
                            <div class="file-field input-field">
                                <div class="btn blue">
                                    <span>بارگزاری تصویر</span>
                                    <input type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>




        <div class="col s12">
            <div class="card">

                <div class="card-header blue padding-1 white-text center-align">انتخاب وضعیت تابلو</div>

                <div class="card-content">
                    <p>وضعیت تابلو را مشخص کنید.</p>
                </div>

                <div class="card-action center-align">

                    <div class="row">

                        <div class="col s3 l3">
                            <div class="switch">
                                <label>
                                    شامل پرداخت عوارض می شود
                                    <input class="ch-blue" type="checkbox" id="check-buy">
                                    <span class="lever"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col s3 l3">
                            <div class="switch">
                                <label>
                                    شامل پرداخت عوارض نمی شود
                                    <input class="ch-green" type="checkbox" id="check-rahn">
                                    <span class="lever"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col s3 l3">
                            <div class="switch">
                                <label>
                                    شامل بهسازی
                                    <input class="ch-orange" type="checkbox" id="check-ejareh">
                                    <span class="lever"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col s3 l3">
                            <div class="switch">
                                <label>
                                    شامل جمع آوری
                                    <input class="ch-brown" type="checkbox" id="check-rahnoejareh">
                                    <span class="lever"></span>
                                </label>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="row" id="buy-item">

        <div class="col s12">
            <div class="card">

                <div class="card-header blue padding-1 white-text center-align">شامل پرداخت عوارض می شود</div>

                <div class="card-content">

                    <div class="padding-1 border-bottom-2px my-blue-text">ابعاد تابلو</div>
                    <div class="row">

                        <div class="col s3">
                            <div class="input-field">
                                <input  id="tol" type="number" class="validate">
                                <label for="tol">طول</label>
                            </div>
                        </div>

                        <div class="col s3">
                            <div class="input-field">
                                <input  id="arz" type="number" class="validate">
                                <label for="arz">عرض</label>
                            </div>
                        </div>

                        <div class="col s6">
                            <div class="input-field">
                                <input disabled  id="result" type="text" class="validate" value="">
                            </div>
                        </div>


                    </div>

                    <div class="padding-1 border-bottom-2px my-blue-text">مشخصات تابلو</div>
                    <div class="row">

                        <div class="col s6">
                            <div class="input-field">
                                <select>
                                    <option value="" disabled selected>محل نصب تابلو</option>
                                    <option value="1">گزینه 1</option>
                                    <option value="2">گزینه 2</option>
                                    <option value="3">گزینه 3</option>
                                </select>
                            </div>
                        </div>

                        <div class="col s6">
                            <div class="input-field">
                                <select>
                                    <option value="" disabled selected>جنس تابلو</option>
                                    <option value="1">گزینه 1</option>
                                    <option value="2">گزینه 2</option>
                                    <option value="3">گزینه 3</option>
                                </select>
                            </div>
                        </div>

                        <div class="col s6">
                            <div class="input-field">
                                <select>
                                    <option value="" disabled selected>خط نوشتاری</option>
                                    <option value="1">گزینه 1</option>
                                    <option value="2">گزینه 2</option>
                                    <option value="3">گزینه 3</option>
                                </select>
                            </div>
                        </div>

                        <div class="col s6">
                            <div class="input-field">
                                <select>
                                    <option value="" disabled selected>موقعیت تابلو</option>
                                    <option value="1">گزینه 1</option>
                                    <option value="2">گزینه 2</option>
                                    <option value="3">گزینه 3</option>
                                </select>
                            </div>
                        </div>

                        <div class="col s12">
                            <div class="input-field">
                                <select>
                                    <option value="" disabled selected>نوع تابلو</option>
                                    <option value="1">گزینه 1</option>
                                    <option value="2">گزینه 2</option>
                                    <option value="3">گزینه 3</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="padding-1 border-bottom-2px my-blue-text">توضیحات کارشناس</div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <textarea id="karshenasdesc" class="materialize-textarea"></textarea>
                                <label class="rtl" for="karshenasdesc">توضیحات خود را در این قسمت وارد کنید</label>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>

    </div>


    <div class="row" id="rahn-item">
        <div class="col s12">
            <div class="card">

                <div class="card-header green padding-1 white-text center-align">شامل پرداخت عوارض نمی شود</div>

                <div class="card-content">

                    <div class="row">
                        <div class="input-field col s12">
                            <select>
                                <option value="" disabled selected>انتخاب علت</option>
                                <option value="1">گزینه 1</option>
                                <option value="2">گزینه 2</option>
                                <option value="3">گزینه 3</option>
                            </select>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="row" id="ejareh-item">
        <div class="col s12">
            <div class="card">

                <div class="card-header orange padding-1 white-text center-align">شامل بهسازی</div>

                <div class="card-content">

                    <div class="row">
                        <div class="input-field col s12">
                            <select>
                                <option value="" disabled selected>انتخاب علت</option>
                                <option value="1">گزینه 1</option>
                                <option value="2">گزینه 2</option>
                                <option value="3">گزینه 3</option>
                            </select>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="row" id="rahnoejareh-item">
        <div class="col s12">
            <div class="card">

                <div class="card-header my-brown padding-1 white-text center-align">شامل جمع آوری</div>

                <div class="card-content">

                    <div class="row">
                        <div class="input-field col s12">
                            <select>
                                <option value="" disabled selected>انتخاب علت</option>
                                <option value="1">گزینه 1</option>
                                <option value="2">گزینه 2</option>
                                <option value="3">گزینه 3</option>
                            </select>
                        </div>
                    </div>



                </div>
            </div>
        </div>


    </div>

@endsection
