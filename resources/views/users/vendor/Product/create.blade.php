@extends('layout')
@section('pageTitle', 'Create Product')
@section('subTitle', 'Products')
@section('currentTitle', 'Create')
@section('nameButton', 'All Products')
@section('routeButton', route('vendor.products.index'))
@section('content')
    <div class="card card-flush">
        <div class="container" style="margin-top: 40px;">
            <h2>Create New Product</h2>
            <form id="create_product" enctype="multipart/form-data" class="form">
                @csrf

                <div class="row">
                    <!-- Product Name and Status next to each other -->
                    <div class="form-group col-md-6 mt-3">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter product name"
                            required>
                    </div>

                    <div class="form-group col-md-6 mt-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <!-- Description below Name and Status -->
                    <div class="form-group col-md-6 mt-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control"
                            placeholder="Enter product description" required></textarea>
                    </div>

                    <!-- Discount -->
                    <div class="form-group col-md-6 mt-3">
                        <label for="discount">Discount (%)</label>
                        <input type="number" name="discount" id="discount" class="form-control"
                            placeholder="Enter discount (0-100)" min="0" max="100" step="0.01">
                    </div>

                    <!-- Price -->
                    <div class="form-group col-md-6 mt-3">
                        <label for="price">Price ($)</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Enter product price"
                            step="0.01" required>
                    </div>

                    <!-- Stock -->
                    <div class="form-group col-md-6 mt-3">
                        <label for="stock">Stock Quantity</label>
                        <input type="number" name="stock" id="stock" class="form-control"
                            placeholder="Enter product stock quantity" required>
                    </div>
                </div>

                <!-- Show current image and main image file input next to each other -->
                <div class="row">
                    <!-- Main Image -->
                    <div class="form-group col-md-6 mt-3">
                        <label for="main_image">Main Product Image</label>
                        <input type="file" name="main_image" id="main_image" class="form-control" required>
                        <small class="form-text text-muted">This image will be the main display image for the
                            product.</small>
                    </div>

                    <!-- Additional images field beside main image field -->
                    <div class="form-group col-md-6 mt-3">
                        <label for="additional_images">Select Product Images</label>
                        <input type="file" name="additional_images[]" id="additional_images" class="form-control" multiple
                            required>
                        <small class="form-text text-muted">
                            Hold down the <strong>Ctrl</strong> (Windows) or <strong>Command</strong> (Mac) key to select
                            multiple images.
                        </small>
                    </div>
                </div>

                <!-- Category and Subcategory -->
                <div class="row">
                    <div class="form-group col-md-6 mt-3">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- SubCategory -->
                    <div class="form-group col-md-6 mt-3">
                        <label for="subcategory_id">SubCategory</label>
                        <select name="subcategory_id" id="subcategory_id" class="form-control" required>
                            <option value="">Select SubCategory</option>
                            @foreach ($categories as $category)
                                @foreach ($category->subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" data-category-id="{{ $category->id }}">
                                        {{ $subcategory->name }}
                                    </option>
                                @endforeach
                            @endforeach
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

                <!-- Field to input new subcategory name and upload image (hidden initially) -->
                <div class="form-group row mt-3" id="other_subcategory_field" style="display: none;">
                    <div class="col-md-6">
                        <label for="new_subcategory_name" class="mt-3">New SubCategory Name</label>
                        <input type="text" name="new_subcategory_name" id="new_subcategory_name" class="form-control"
                            placeholder="Enter new subcategory name">
                    </div>

                    <!-- Field to upload image for the new subcategory -->
                    <div class="col-md-6">
                        <label for="subcategory_image" class="mt-3">Upload Image for New SubCategory</label>
                        <input type="file" name="subcategory_image" id="subcategory_image" class="form-control" required>
                    </div>
                </div>

                <!-- ✅ السمات داخل الفورم -->
                <label for="attributes" class="mt-5 form-label">Product Attributes</label>
                <div class="row" id="attribute-container">
                    @foreach ([0] as $index)
                        <!-- تأكد من أن المتغير $attributes يحتوي على السمات الحالية -->
                        <div class="col-md-4 mb-4">
                            <div class="attribute p-3 border rounded shadow-sm">
                                <div class="form-group mb-3">
                                    <label for="attributes[{{ $index }}][name]" class="form-label">Attribute
                                        Name</label>
                                    <input type="text" name="attributes[{{ $index }}][name]"
                                        class="form-control attribute-name mb-2" placeholder="Attribute name" required>
                                </div>

                                <div class="value-container mb-3 p-3 border rounded shadow-sm">
                                    <label for="attributes[{{ $index }}][values][]" class="mt-3 form-label">Value</label>
                                    <input type="text" name="attributes[{{ $index }}][values][]"
                                        class="form-control attribute-value mb-2" placeholder="Value" required>
                                </div>

                                <button type="button" class="btn btn-sm btn-info mt-2 add-value w-100"
                                    data-attribute-index="{{ $index }}">Add Value</button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- زر لإضافة سمة جديدة -->
                <button type="button" class="btn btn-sm btn-success my-5" id="add-attribute">Add Attribute</button>

                <button type="button" class="btn btn-secondary mb-3" onclick="generateVariants()">🔄 توليد
                    التركيبات</button>
                <div id="variant-container"></div>

                {{-- <button type="button" onclick="createProduct()" id="add-product-btn" class="btn btn-primary mt-5" @php
                    use Illuminate\Support\Facades\Auth; if (auth::user()->status == 'pending') {
                    echo 'disabled';
                    }
                    @endphp>
                    Create
                    Product</button> --}}
                <button type="button" onclick="createProduct()" id="add-product-btn" class="btn btn-primary mt-5">
                    Create Product </button>

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
                        '<option value="">Select SubCategory</option>');
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
                                '<option value="">Select SubCategory</option>');
                            $.each(response.subcategories, function (key, subcategory) {
                                $('#subcategory_id').append('<option value="' +
                                    subcategory.id + '">' + subcategory.name +
                                    '</option>');
                            });
                            $('#subcategory_id').append('<option value="other">Other</option>');
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
                                                                                                            <label for="attributes" class="form-label">Attribute Name</label>
                                                                                                            <input type="text" name="attributes[${newAttributeIndex}][name]" class="form-control attribute-name mb-2" placeholder="Attribute name" required>
                                                                                                        </div>

                                                                                                        <div class="value-container mb-3 p-3 border rounded shadow-sm">
                                                                                                            <label for="new_subcategory_name" class="mt-3 form-label">Value</label>
                                                                                                            <input type="text" name="attributes[${newAttributeIndex}][values][]" class="form-control attribute-value mb-2" placeholder="Value" required>
                                                                                                        </div>

                                                                                                        <button type="button" class="btn btn-sm btn-info mt-2 add-value w-100" data-attribute-index="${newAttributeIndex}">Add Value</button>
                                                                                                    </div>
                                                                                                </div>`;
                $('#attribute-container').append(field); // إضافة السمة إلى الـ DOM
            });

            // زر إضافة قيمة جديدة لكل سمة
            $(document).on('click', '.add-value', function () {
                const index = $(this).data('attribute-index');
                const newValue = `
                                                                                                <div class="value-container mb-3 p-3 border rounded shadow-sm">
                                                                                                    <label for="new_subcategory_name" class="mt-3 form-label">Value</label>
                                                                                                    <input type="text" name="attributes[${index}][values][]" class="form-control attribute-value mb-2" placeholder="Value" required>
                                                                                                </div>`;
                $(this).before(newValue); // إضافة الحقل الجديد قبل الزر
            });

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



                //                document.addEventListener('click', function (event) {
                //     if (event.target && event.target.classList.contains('add-value')) {
                //         const button = event.target;
                //         const attributeIndex = button.getAttribute('data-attribute-index');
                //         const attributeNameInput = document.querySelector(`[name="attributes[${attributeIndex}][name]"]`);
                //         const attributeValueInputs = document.querySelectorAll(`[name="attributes[${attributeIndex}][values][]"]`);

                //         // التحقق من أن اسم السمة غير فارغ
                //         if (attributeNameInput.value.trim() === '') {
                //             alert('Attribute name must not be empty.');
                //             return;
                //         }

                //         // التحقق من وجود قيمة واحدة على الأقل
                //         let isValueFilled = false;
                //         attributeValueInputs.forEach(input => {
                //             if (input.value.trim() !== '') {
                //                 isValueFilled = true;
                //             }
                //         });

                //         if (!isValueFilled) {
                //             alert('At least one attribute value must be entered.');
                //             return;
                //         }

                //         // إنشاء حقل جديد للقيمة
                //         const newValueContainer = document.createElement('div');
                //         newValueContainer.classList.add('value-container', 'mb-3', 'p-3', 'border', 'rounded', 'shadow-sm');

                //         const newValueInput = document.createElement('input');
                //         newValueInput.setAttribute('type', 'text');
                //         newValueInput.setAttribute('name', `attributes[${attributeIndex}][values][]`);
                //         newValueInput.classList.add('form-control', 'attribute-value', 'mb-2');
                //         newValueInput.setAttribute('placeholder', 'Value');
                //         newValueContainer.appendChild(newValueInput);

                //         button.parentNode.appendChild(newValueContainer);
                //     }
                // });




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
                                                                                                                    <label>Price</label>
                                                                                                                    <input type="number" class="form-control variant-price" placeholder="Variant Price" step="0.01" required>
                                                                                                                </div>

                                                                                                                <!-- حقل الكمية -->
                                                                                                                <div class="form-group mb-2">
                                                                                                                    <label>Quantity</label>
                                                                                                                    <input type="number" class="form-control variant-quantity" placeholder="Variant Quantity" required>
                                                                                                                </div>

                                                                                                                <!-- حقل الصورة -->
                                                                                                                <div class="form-group mb-2">
                                                                                                                    <label>Image</label>
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
                        combinations.push({ ...current });
                        return;
                    }
                    const key = keys[index];
                    attributes[key].forEach(value => {
                        helper(index + 1, { ...current, [key]: value });
                    });
                }
                helper(0, {});
                return combinations;
            }

            // إرسال البيانات بـ AJAX
            document.getElementById('create_product').addEventListener('submit', function (e) {
                e.preventDefault();

                const form = e.target;
                const formData = new FormData(form);

                const attributes = [];
                document.querySelectorAll('.attribute-block').forEach(block => {
                    const name = block.querySelector('.attribute-name').value;
                    const values = Array.from(block.querySelectorAll('.attribute-value')).map(i => i.value);
                    attributes.push({ name, values });
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
                        alert('Error occurred while submitting.');
                    });

            });
        });
    </script>


    <script>
        function createProduct() {

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
                    errorMessage = `Attribute #${idx + 1}: name entered but no values provided.`;
                }

                // 🔴 الحالة 2: قيم موجودة لكن الاسم فارغ
                if (name === "" && values.length > 0) {
                    validationFailed = true;
                    errorMessage = `Attribute #${idx + 1}: values entered but attribute name is missing.`;
                }

                attributes.push({ name, values });
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
            // هنا ضع الكود الخاص بتوليد التركيبات
            console.log("تم توليد التركيبات");

            // مثال: إضافة عناصر إلى div variant-container
            document.getElementById('variant-container').innerHTML = "<p>تم إنشاء التركيبات!</p>";

            variantsGenerated = true; // تحديث المتغير عند النقر
        }

        function createProduct() {
            if (!variantsGenerated) {
                alert('يجب الضغط على زر 🔄 توليد التركيبات أولاً!');
                return; // يمنع الاستمرار
            }

            // إذا تم توليد التركيبات، يمكن إرسال الفورم
            document.getElementById('productForm').submit();
        }
    </script>
@endsection
{{-- // <<<<<<< HEAD // function createProduct() { // const form=document.getElementById("create_product"); // const
    formData=new FormData(form); // // عرض البيانات في الكونسول قبل إرسالها // formData.forEach((value, key)=> {
    // console.log(`${key}: ${value}`);
    // });

    // // إرسال البيانات باستخدام دالة store() - AJAX
    // store('/vendor/products', formData)
    // .then(() => {
    // // إعادة تعيين الفورم بعد النجاح
    // form.reset();
    // console.log('Data submitted successfully');
    // })
    // .catch(error => {
    // // عرض الأخطاء إذا حدثت
    // console.error("Error in resetting data..", error);
    // console.log('Error occurred during data submission');
    // });
    // }


    </script> --}}
    {{-- =======
    </script>
    >>>>>>> fb599ce12ee098993aa02190a198f7fcb1cf3f84 --}}