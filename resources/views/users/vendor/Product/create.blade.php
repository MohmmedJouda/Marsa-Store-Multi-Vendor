@extends('layout')
@section('pageTitle', 'اضافة المنتجات')
@section('subTitle', 'المنتجات')
@section('currentTitle', 'اضافة')
@section('nameButton', 'عرض المنتجات')
@section('routeButton', route('vendor.products.index'))
@section('content')
    <div class="card card-flush">
        <div class="container" style="margin-top: 40px;">
            <h2>اضافة منتج جديد</h2>
            <form id="create_product" enctype="multipart/form-data" class="form">
                @csrf

                <div class="row">
                    <!-- Product Name and Status next to each other -->
                    <div class="form-group col-md-6 mt-3">
                        <label for="name">اسم المنتج</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="ادخل اسم المنتج"
                            required>
                    </div>

                    <div class="form-group col-md-6 mt-3">
                        <label for="status">الحالة</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="active">فعال</option>
                            <option value="inactive">غير فعال</option>
                        </select>
                    </div>

                    <!-- Description below Name and Status -->
                    <div class="form-group col-md-6 mt-3">
                        <label for="description">الوصف</label>
                        <textarea name="description" id="description" class="form-control" placeholder="أكتب وصف المنتج"
                            required></textarea>
                    </div>

                    <!-- Discount -->
                    <div class="form-group col-md-6 mt-3">
                        <label for="discount">الخصم (%)</label>
                        <input type="number" name="discount" id="discount" class="form-control"
                            placeholder="ادخل الخصم (0-100)" min="0" max="100" step="0.01" style="text-align: right">
                    </div>

                    <!-- Price -->
                    {{-- <div class="form-group col-md-6 mt-3">
                        <label for="price">السعر (₪)</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="ادخل سعر المنتج"
                            step="0.01" required>
                    </div> --}}

                    <!-- Stock -->
                    {{-- <div class="form-group col-md-6 mt-3">
                        <label for="stock">كمية المخزون</label> --}}
                        {{-- <div class="form-group col-md-6 mt-3">
                            <label for="stock">Stock Quantity</label>
                            <input type="number" name="stock" id="stock" class="form-control"
                                placeholder="أدخل كمية مخزون المنتج" required>
                        </div>
                        placeholder="Enter product stock quantity" required>
                    </div> --}}
                </div>

                <!-- Show current image and main image file input next to each other -->
                <div class="row">
                    <!-- Main Image -->
                    <div class="form-group col-md-6 mt-3">
                        <label for="main_image">الصورة الرئيسية للمنتج</label>
                        <input type="file" name="main_image" id="main_image" class="form-control" required>
                        <small class="form-text text-muted">ستكون هذه الصورة هي صورة العرض الرئيسية للمنتج.</small>
                    </div>

                    <!-- Additional images field beside main image field -->
                    <div class="form-group col-md-6 mt-3">
                        <label for="additional_images">اختر صور المنتج</label>
                        <input type="file" name="additional_images[]" id="additional_images" class="form-control" multiple
                            required>
                        <small class="form-text text-muted">
                            اضغط باستمرار على <strong>Ctrl</strong> (Windows) أو <strong>Command</strong> (Mac)اختار مفتاح
                            لاختيار صور متعددة.
                        </small>
                    </div>
                </div>

                <!-- Category and Subcategory -->
                <div class="row">
                    <div class="form-group col-md-6 mt-3">
                        <label for="category_id">القسم</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">اختر القسم</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- SubCategory -->
                    <div class="form-group col-md-6 mt-3">
                        <label for="subcategory_id">القسم الفرعي</label>
                        <select name="subcategory_id" id="subcategory_id" class="form-control" required>
                            <option value="">اختر القسم الفرعي</option>
                            @foreach ($categories as $category)
                                @foreach ($category->subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" data-category-id="{{ $category->id }}">
                                        {{ $subcategory->name }}
                                    </option>
                                @endforeach
                            @endforeach
                            <option value="other">اخرى</option>
                        </select>
                    </div>
                </div>

                <!-- Field to input new subcategory name and upload image (hidden initially) -->
                <div class="form-group row mt-3" id="other_subcategory_field" style="display: none;">
                    <div class="col-md-6">
                        <label for="new_subcategory_name" class="mt-3">اسم القسم الفرعية الجديدة</label>
                        <input type="text" name="new_subcategory_name" id="new_subcategory_name" class="form-control"
                            placeholder="أدخل اسم القسم الفرعي الجديدة">
                    </div>

                    <!-- Field to upload image for the new subcategory -->
                    <div class="col-md-6">
                        <label for="subcategory_image" class="mt-3">تحميل صورة للقسم الفرعي الجديد</label>
                        <input type="file" name="subcategory_image" id="subcategory_image" class="form-control" required>
                    </div>
                </div>

                <!-- ✅ السمات داخل الفورم -->
                <div class="form-group mt-4">
                    <label class="form-label fw-bold">خيارات المنتج</label>
                    <div>
                        <label class="me-3">
                            <input type="radio" name="product_type" value="with_attributes" checked>
                            بسمات
                        </label>
                        <label>
                            <input type="radio" name="product_type" value="without_attributes">
                            دون سمات
                        </label>
                    </div>
                </div>

                <!-- القسم الأول: بسمات -->
                <div id="with-attributes-section" class="mt-4">
                    <label for="attributes" class="mt-5 form-label">سمات المنتج</label>
                    <div class="row" id="attribute-container">
                        @foreach ([0] as $index)
                            <div class="col-md-4 mb-4">
                                <div class="attribute p-3 border rounded shadow-sm">
                                    <div class="form-group mb-3">
                                        <label for="attributes[{{ $index }}][name]" class="form-label">اسم السمة</label>
                                        <input type="text" name="attributes[{{ $index }}][name]"
                                            class="form-control attribute-name mb-2" placeholder="مثال : اللون" required>
                                    </div>

                                    <div class="value-container mb-3 p-3 border rounded shadow-sm">
                                        <label for="attributes[{{ $index }}][values][]" class="mt-3 form-label">القيمة</label>
                                        <input type="text" name="attributes[{{ $index }}][values][]"
                                            class="form-control attribute-value mb-2" placeholder="مثال : أحمر" required>
                                    </div>

                                    <button type="button" class="btn btn-sm btn-info mt-2 add-value w-100"
                                        data-attribute-index="{{ $index }}">اضافة قيمة اخرى</button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button type="button" class="btn btn-sm btn-success my-5" id="add-attribute">اضافة سمة جديدة</button>

                    <button type="button" class="btn btn-sm btn-secondary my-5" onclick="generateVariants()">توليد
                        التشكيلات</button>
                    <div id="variant-container"></div>

                    <button type="button" onclick="createProduct()" id="add-product-btn" class="btn btn-primary mt-5">
                        اضافة المنتج
                    </button>
                </div>

                <!-- القسم الثاني: دون سمات -->
                <div id="without-attributes-section" class="mt-4" style="display: none;">
                    <div class="row">
                        <div class="form-group col-md-6 mt-3">
                            <label for="price">السعر (₪)</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="ادخل سعر المنتج"
                                step="0.01" style="text-align: right" required>
                        </div>

                        <div class="form-group col-md-6 mt-3">
                            <label for="stock">كمية المخزون</label>
                            <input type="number" name="stock" id="stock" class="form-control"
                                placeholder="أدخل كمية مخزون المنتج" style="text-align: right" required>
                        </div>
                    </div>

                    <button type="button" onclick="createProduct()" id="add-product-btn2" class="btn btn-primary mt-5">
                        اضافة المنتج
                    </button>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const withAttributes = document.getElementById('with-attributes-section');
                        const withoutAttributes = document.getElementById('without-attributes-section');
                        const radios = document.querySelectorAll('input[name="product_type"]');

                        radios.forEach(radio => {
                            radio.addEventListener('change', function () {
                                if (this.value === 'with_attributes') {
                                    withAttributes.style.display = 'block';
                                    withoutAttributes.style.display = 'none';
                                } else {
                                    withAttributes.style.display = 'none';
                                    withoutAttributes.style.display = 'block';
                                }
                            });
                        });
                    });
                </script>


            </form>
        </div>
    </div>

    <style>
        #add-product-btn {
            left: 50%;
            /* لضبط الزر في المنتصف */
            z-index: 999;
            /* التأكد من أن الزر سيظهر فوق العناصر الأخرى */
            padding: 10px 20px;
            /* إضافة حشو للزر */
            font-size: 16px;
            /* تغيير حجم الخط */
            background-color: #007bff;
            /* تحديد اللون الخلفي */
            color: white;
            /* تحديد اللون النص */
            border: none;
            /* إزالة الحدود */
            border-radius: 5px;
            /* جعل الزوايا مدورة */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* إضافة ظل خفيف للزر */
            transition: background-color 0.3s ease;
            /* تأثير تغيير اللون عند المرور */
            width: 100%
        }

        #add-product-btn:hover {
            background-color: #0056b3;
            /* تغيير اللون عند مرور الفأرة فوق الزر */
        }
    </style>
@endsection


@section('script')
    <script src="{{ asset('assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/crud.js') }}"></script>

    <script>
        $(document).ready(function () {
            // تعطيل حقل Subcategory عند تحميل الصفحة
            $('#subcategory_id').prop('disabled', true);

            // جلب الفئات الفرعية عند اختيار فئة
            $('#category_id').change(function () {
                var categoryId = $(this).val();

                if (!categoryId) {
                    $('#subcategory_id').prop('disabled', true).empty().append(
                        '<option value=""> القسم الفرعي</option>');
                    $('#other_subcategory_field').hide();
                } else {
                    $('#subcategory_id').prop('disabled', false);
                    $.ajax({
                        url: '{{ route('getSubcategories') }}',
                        method: 'GET',
                        data: {
                            category_id: categoryId
                        },
                        success: function (response) {
                            $('#subcategory_id').empty().append(
                                '<option value="">اختر القسم الفرعي </option>');
                            $.each(response.subcategories, function (key, subcategory) {
                                $('#subcategory_id').append('<option value="' +
                                    subcategory.id + '">' + subcategory.name +
                                    '</option>');
                            });
                            $('#subcategory_id').append('<option value="other">غير</option>');
                        }
                    });
                }
            });

            // عرض حقل إضافة subcategory جديد
            $('#subcategory_id').on('change', function () {
                $('#other_subcategory_field').toggle($(this).val() === 'other');
            });

            // التعامل مع السمات الأولى التي تم تحميلها من الخادم
            $('#add-attribute').click(function () {
                const newAttributeIndex = $('.attribute').length; // تحديد الفهرس للسمات المضافة

                const field = `
                                                                                                                                                                        <div class="col-md-4 mb-4">
                                                                                                                                                                            <div class="attribute p-3 border rounded shadow-sm">
                                                                                                                                                                                <div class="form-group mb-3">
                                                                                                                                                                                    <label for="attributes" class="form-label">السمة</label>
                                                                                                                                                                                    <input type="text" name="attributes[${newAttributeIndex}][name]" class="form-control attribute-name mb-2" placeholder="اسم السمة" required>
                                                                                                                                                                                </div>

                                                                                                                                                                                <div class="value-container mb-3 p-3 border rounded shadow-sm">
                                                                                                                                                                                    <label for="new_subcategory_name" class="mt-3 form-label">القيمة</label>
                                                                                                                                                                                    <input type="text" name="attributes[${newAttributeIndex}][values][]" class="form-control attribute-value mb-2" placeholder="اسم القيمة" required>
                                                                                                                                                                                </div>

                                                                                                                                                                                <button type="button" class="btn btn-sm btn-info mt-2 add-value w-100" data-attribute-index="${newAttributeIndex}">أضف قيمة</button>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>`;
                $('#attribute-container').append(field); // إضافة السمة إلى الـ DOM
            });

            // زر إضافة قيمة جديدة لكل سمة
            $(document).on('click', '.add-value', function () {
                const index = $(this).data('attribute-index');
                const newValue =
                    `
                                                                                                                                                                                                                                                        <div class="value-container mb-3 p-3 border rounded shadow-sm">
                                                                                                                                                                                                                                                            <label for="new_subcategory_name" class="mt-3 form-label">قيمة</label>
                                                                                                                                                                                                                                                            <input type="text" name="attributes[${index}][values][]" class="form-control attribute-value mb-2" placeholder="قيمة" required>
                                                                                                                                                                                                                                                        </div>`;
                $(this).before(newValue); // إضافة الحقل الجديد قبل الزر
            });


            // إرسال البيانات بـ AJAX
            document.getElementById('create_product').addEventListener('submit', function (e) {
                e.preventDefault();

                const form = e.target;
                const formData = new FormData(form);

                const attributes = [];
                document.querySelectorAll('.attribute-block').forEach(block => {
                    const name = block.querySelector('.attribute-name').value;
                    const values = Array.from(block.querySelectorAll('.attribute-value')).map(i => i
                        .value);
                    attributes.push({
                        name,
                        values
                    });
                });

                formData.append('attributes', JSON.stringify(attributes));

                document.querySelectorAll('.variant-row').forEach((row, i) => {
                    let attrs = {};
                    try {
                        attrs = JSON.parse(row.dataset.attributes);
                    } catch (e) {
                        console.error('Invalid JSON in variant attributes:', e);
                        return;
                    }

                    const price = row.querySelector('.variant-price').value;
                    const quantity = row.querySelector('.variant-quantity').value;

                    formData.append(`variants[${i}][price]`, price);
                    formData.append(`variants[${i}][quantity]`, quantity);
                    formData.append(`variants[${i}][attributes]`, JSON.stringify(attrs));

                    const imageInput = row.querySelector('.variant-image');
                    if (imageInput && imageInput.files.length > 0) {
                        formData.append(`variants[${i}][image]`, imageInput.files[0]);
                    }
                });

                fetch("{{ route('vendor.products.store') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                    .then(res => res.json())
                    .then(data => {
                        alert(data.message);
                        if (data.message.includes('success')) location.reload();
                    })
                    .catch(error => {
                        console.error(error);
                        alert('حدث خطأ خلال تقديم الطلب');
                    });

            });
        });
    </script>


    <script>
        function createProduct() {

            const productType = document.querySelector('input[name="product_type"]:checked').value;

            if (productType === 'with_attributes' && !variantsGenerated) {
                alert('يجب الضغط على زر 🔄 توليد التركيبات أولاً!');
                return; // يمنع الاستمرار
            }

            const form = document.getElementById("create_product");
            const formData = new FormData(form);

            // ✅ التحقق من الحقول قبل الإرسال
            const attributes = [];
            let validationFailed = false;
            let errorMessage = "";

            document.querySelectorAll('.attribute').forEach((block, idx) => {
                const name = block.querySelector('.attribute-name').value.trim();
                const valueInputs = block.querySelectorAll('.attribute-value');

                const values = Array.from(valueInputs)
                    .map(i => i.value.trim())
                    .filter(v => v !== "");

                // 🔴 الحالة 1: اسم موجود لكن ما في قيم
                if (name !== "" && values.length === 0) {
                    validationFailed = true;
                    errorMessage = `Attribute #${idx + 1}: يرجى ادخال قيم للسمة`;
                }

                // 🔴 الحالة 2: قيم موجودة لكن الاسم فارغ
                if (name === "" && values.length > 0) {
                    validationFailed = true;
                    errorMessage = `Attribute #${idx + 1}: تم ادخال قيم للسمة لكن اسم السمة مفقود`;
                }

                attributes.push({
                    name,
                    values
                });
            });

            if (validationFailed) {
                alert(errorMessage);
                return;
            }

            // 🟢 أضف السمات إلى FormData
            formData.append('attributes', JSON.stringify(attributes));

            // 🟢 إضافة التركيبات (variants)
            document.querySelectorAll('.variant-row').forEach((row, i) => {
                let attrs = {};
                try {
                    attrs = JSON.parse(row.dataset.attributes);
                } catch (e) {
                    console.error('Invalid JSON in variant attributes:', e);
                    return;
                }

                formData.append(`variants[${i}][price]`, row.querySelector('.variant-price').value);
                formData.append(`variants[${i}][quantity]`, row.querySelector('.variant-quantity').value);
                formData.append(`variants[${i}][attributes]`, JSON.stringify(attrs));

                const imageInput = row.querySelector('.variant-image');
                if (imageInput && imageInput.files.length > 0) {
                    formData.append(`variants[${i}][image]`, imageInput.files[0]);
                }
            });

            // 🟢 تنفيذ الإرسال
            store('/vendor/products', formData)
                .then(() => {
                    form.reset();
                    console.log('done');
                })
                .catch(error => {
                    console.error("error in reset data..", error);
                });
        }

        let variantsGenerated = false;

        function generateVariants() {
            // توليد التركيبات عند الضغط على "توليد التركيبات"
            window.generateVariants = function () {
                const attributes = {};

                // جمع السمات والقيم المدخلة
                $('.attribute').each(function () {
                    const name = $(this).find('.attribute-name').val().trim();
                    const values = $(this).find('.attribute-value').map(function () {
                        return $(this).val().trim();
                    }).get().filter(Boolean);

                    if (name && values.length) {
                        attributes[name] = values; // إضافة السمة مع قيمها
                    }
                });


                // توليد التركيبات
                const combinations = generateCombinations(attributes);
                const container = document.getElementById('variant-container');
                container.innerHTML = ''; // مسح التركيبات القديمة

                combinations.forEach((combo, i) => {
                    const comboText = Object.entries(combo)
                        .map(([k, v]) => `<strong>${k}</strong>: ${v}`) // تجميع كل سمة مع قيمتها
                        .join(' | ');

                    // إضافة كل تركيبة إلى الحاوية
                    container.insertAdjacentHTML('beforeend', `
                                                                                                                                                                    <div class="row">
                                                                                                                                                                        <div class="col-md-6">
                                                                                                                                                                            <div class="variant-item p-3 mb-3 border rounded shadow-sm variant-row" data-attributes='${JSON.stringify(combo)}'>
                                                                                                                                                                                <p>${comboText}</p>

                                                                                                                                                                                <!-- حقل السعر -->
                                                                                                                                                                                <div class="form-group mb-2">
                                                                                                                                                                                    <label>السعر(₪)</label>
                                                                                                                                                                                    <input type="number" class="form-control variant-price" style="text-align:right" placeholder=" سعر التشكيلة" step="0.01" required>
                                                                                                                                                                                </div>

                                                                                                                                                                                <!-- حقل الكمية -->
                                                                                                                                                                                <div class="form-group mb-2">
                                                                                                                                                                                    <label>الكمية</label>
                                                                                                                                                                                    <input type="number" class="form-control variant-quantity" style="text-align:right" placeholder="كمية التشكيلة " required>
                                                                                                                                                                                </div>

                                                                                                                                                                                <!-- حقل الصورة -->
                                                                                                                                                                                <div class="form-group mb-2">
                                                                                                                                                                                    <label>الصورة</label>
                                                                                                                                                                                    <input type="file" class="form-control variant-image" accept="image/*">
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>`);
                });
            }



            // دالة لتوليد التركيبات
            function generateCombinations(attributes) {
                const keys = Object.keys(attributes);
                if (keys.length === 0) return [];
                const combinations = [];

                function helper(index, current) {
                    if (index === keys.length) {
                        combinations.push({
                            ...current
                        });
                        return;
                    }
                    const key = keys[index];
                    attributes[key].forEach(value => {
                        helper(index + 1, {
                            ...current,
                            [key]: value
                        });
                    });
                }
                helper(0, {});
                return combinations;
            }

            variantsGenerated = true; // تحديث المتغير عند النقر
        }

        // function createProduct() {

        //     // إذا تم توليد التركيبات، يمكن إرسال الفورم
        //     document.getElementById('productForm').submit();
        // }


        document.querySelector('form').addEventListener('submit', function (e) {
            const productType = document.querySelector('input[name="product_type"]:checked').value;

            if (productType === 'without_attributes') {
                const price = document.querySelector('input[name="price"]');
                const stock = document.querySelector('input[name="stock"]');

                if (!price.value || !stock.value) {
                    e.preventDefault();
                    alert('الرجاء إدخال السعر وكمية المخزون.');
                }
            }
        });
    </script>
@endsection