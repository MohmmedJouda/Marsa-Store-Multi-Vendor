@extends('layout')
@section('pageTitle', 'تعديل المنتج')
@section('subTitle', 'المنتجات')
@section('currentTitle', 'تعديل')
@section('nameButton', 'جميع المنتجات')
@section('routeButton', route('vendor.products.index'))
@section('content')
    <div class="card card-flush">
        <div class="container" style="margin-top: 40px;">
            <h2>Edit Product: {{ $product->name }}</h2>
            <form id="edit_product" enctype="multipart/form-data" class="form">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Product Name and Status -->
                    <div class="form-group col-md-6 mt-3">
                        <label for="name">اسم المنتج</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}"
                            required>
                    </div>

                    <div class="form-group col-md-6 mt-3">
                        <label for="status">الحالة</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive
                            </option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="form-group col-md-6 mt-3">
                        <label for="description">الوصف</label>
                        <textarea name="description" id="description" class="form-control" required>{{ $product->description }}</textarea>
                    </div>

                    <!-- Discount -->
                    <div class="form-group col-md-6 mt-3">
                        <label for="discount">الخصم (%)</label>
                        <input type="number" name="discount" id="discount" class="form-control"
                            value="{{ $product->discount }}" min="0" max="100" step="0.01" style="text-align: right">
                    </div>

                    <!-- Price and Stock -->
                    {{-- <div class="form-group col-md-6 mt-3">
                        <label for="price">Price ($)</label>
                        <input type="number" name="price" id="price" class="form-control"
                            value="{{ $product->price }}" step="0.01" required>
                    </div>

                    <div class="form-group col-md-6 mt-3">
                        <label for="stock">Stock Quantity</label>
                        <input type="number" name="stock" id="stock" class="form-control"
                            value="{{ $product->stock }}" required>
                    </div> --}}
                </div>

                <!-- Images Section -->
                <div class="row mt-3">
                    <!-- Main Image -->
                    <div class="form-group col-md-6">
                        <label>الصورة الرئيسية الحالية</label>
                        <div class="current-images-container mb-2 ">
                            @php
                                $mainImage = $product->images->firstWhere('is_main', true);
                            @endphp
                            @if ($mainImage)
                                <img src="{{ asset('storage/' . $mainImage->image_path) }}" class="img-thumbnail"
                                    style="max-height: 150px;">
                            @else
                                <p>لا يوجد صورة رئيسية متاحة</p>
                            @endif


                        </div>
                        <label for="main_image">تحديث  الصورة الرئيسية</label>
                        <input type="file" name="main_image" id="main_image" class="form-control">
                    </div>

                    <!-- Additional Images -->
                    <div class="form-group col-md-6">
                        <label>الصور الفرعية الحالية</label>
                        <div class="current-images-container mb-2 d-flex flex-wrap">
                            @foreach ($product->images->where('is_main', false) as $image)
                                <div class="position-relative me-2 mb-2">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" class="img-thumbnail "
                                        style="max-height: 150px;">
                                    <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0"
                                        onclick="removeImage({{ $image->id }})">×</button>
                                </div>
                            @endforeach
                        </div>
                        <label for="additional_images">أضف المزيد من الصور</label>
                        <input type="file" name="additional_images[]" id="additional_images" class="form-control"
                            multiple>
                    </div>
                </div>

                <!-- Category and Subcategory -->
                <div class="row mt-3">
                    <div class="form-group col-md-6">
                        <label for="category_id">القسم</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">اختر القسم</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $product->subcategory ? ($product->subcategory->category_id == $category->id ? 'selected' : '') : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">القسم الفرعي</label>
                        <select name="subcategory_id" id="subcategory_id" class="form-control" required>
                            <option value=""> اختر القسم الفرعي</option>
                            @foreach ($categories as $category)
                                @foreach ($category->subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" data-category-id="{{ $category->id }}"
                                        {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                        {{ $subcategory->name }}
                                    </option>
                                @endforeach
                            @endforeach
                            <option value="other" {{ !$product->subcategory ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                </div>


                <!-- New Subcategory Fields -->
                <div class="form-group row mt-3" id="other_subcategory_field"
                    style="{{ !$product->subcategory ? '' : 'display: none;' }}">
                    <div class="col-md-6">
                        <label for="new_subcategory_name">اسم القسم الفرعي الجديد</label>
                        <input type="text" name="new_subcategory_name" id="new_subcategory_name" class="form-control"
                            value="{{ $product->subcategory->name ?? '' }}">
                    </div>
                    <div class="col-md-6">
                        <label for="subcategory_image">صورة للقسم الفرعي</label>
                        <input type="file" name="subcategory_image" id="subcategory_image" class="form-control">
                    </div>
                </div>

                <!-- Attributes Section -->
                <label class="mt-5 form-label">سمات المنتج</label>
                <div class="row" id="attribute-container">
                    @foreach ($product->attributes as $index => $attribute)
                        <div class="col-md-4 mb-4">
                            <div class="attribute p-3 border rounded shadow-sm">
                                <div class="form-group mb-3">
                                    <label class="form-label">اسم السمة</label>
                                    <input type="text" name="attributes[{{ $index }}][name]"
                                        class="form-control attribute-name mb-2" placeholder="مثال: اللون" value="{{ $attribute->name }}" required>
                                </div>

                                @foreach ($attribute->values as $valueIndex => $value)
                                    <div class="value-container mb-3 p-3 border rounded shadow-sm">
                                        <label class="form-label">القيمة</label>
                                        <input type="text" name="attributes[{{ $index }}][values][]"
                                            class="form-control attribute-value mb-2" placeholder="مثال: أحمر" value="{{ $value->value }}"
                                            required>
                                    </div>
                                @endforeach

                                <button type="button" class="btn btn-sm btn-info mt-2 add-value w-100"
                                    data-attribute-index="{{ $index }}"> أضف قيمة</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-sm btn-success my-5" id="add-attribute">أضف سمة </button>

                <!-- Variants Section -->
                <button type="button" class="btn btn-secondary mb-3" onclick="generateVariants()">
                    توليد التشكيلات
                </button>
                <div id="variant-container">
                    @foreach ($product->variants as $variant)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="variant-item p-3 mb-3 border rounded shadow-sm variant-row"
                                    data-attributes='{{ json_encode($variant->combination) }}'>
                                    <input type="hidden" class="variant-id" value="{{ $variant->id }}">

                                    @foreach ($variant->combination as $key => $value)
                                        <p><strong>{{ $key }}</strong>: {{ $value }}</p>
                                    @endforeach 


                                    <div class="form-group mb-2">
                                        <label>السعر</label>
                                        <input type="number" class="form-control variant-price"
                                            value="{{ $variant->price }}" step="0.01" required>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label>الكمية</label>
                                        <input type="number" class="form-control variant-quantity"
                                            value="{{ $variant->quantity }}" required>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label>الصورة</label>
                                        @if ($variant->image)
                                            <div class="current-image-container mb-2">
                                                <img src="{{ asset('storage/' . $variant->image) }}"
                                                    class="img-thumbnail" style="max-height: 100px;">
                                            </div>
                                        @endif
                                        <input type="file" class="form-control variant-image">
                                    </div>



                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" onclick="updateProduct()" id="update-product-btn"
                    class="btn btn-primary mt-5"> تحديث المنتج</button>
            </form>
        </div>
    </div>

    <style>
        #update-product-btn {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
            width: 100%;
        }

        #update-product-btn:hover {
            background-color: #218838;
        }

        .current-images-container img {
            transition: all 0.3s;
        }

        .current-images-container img:hover {
            transform: scale(1.05);
        }

        img {
            width: 150px;
            height: 150px;
            object-fit: contain;
        }
    </style>
@endsection

@section('script')
    <script src="{{ asset('assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/crud.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Initialize category and subcategory
            const initialCategoryId = $('#category_id').val();
            if (initialCategoryId) {
                loadSubcategories(initialCategoryId);
            }

            // Category change handler
            $('#category_id').change(function() {
                const categoryId = $(this).val();
                loadSubcategories(categoryId);
            });

            // Subcategory change handler
            $('#subcategory_id').on('change', function() {
                $('#other_subcategory_field').toggle($(this).val() === 'other');
            });

            // Add attribute handler
            $('#add-attribute').click(function() {
                const newAttributeIndex = $('.attribute').length;
                const field = `
                    <div class="col-md-4 mb-4">
                        <div class="attribute p-3 border rounded shadow-sm">
                            <div class="form-group mb-3">
                                <label class="form-label">Attribute Name</label>
                                <input type="text" name="attributes[${newAttributeIndex}][name]"
                                       class="form-control attribute-name mb-2" required>
                            </div>
                            <div class="value-container mb-3 p-3 border rounded shadow-sm">
                                <label class="form-label">Value</label>
                                <input type="text" name="attributes[${newAttributeIndex}][values][]"
                                       class="form-control attribute-value mb-2" required>
                            </div>
                            <button type="button" class="btn btn-sm btn-info mt-2 add-value w-100"
                                    data-attribute-index="${newAttributeIndex}">Add Value</button>
                        </div>
                    </div>`;
                $('#attribute-container').append(field);
            });

            // Add value handler
            $(document).on('click', '.add-value', function() {
                const index = $(this).data('attribute-index');
                const newValue = `
                    <div class="value-container mb-3 p-3 border rounded shadow-sm">
                        <label class="form-label">Value</label>
                        <input type="text" name="attributes[${index}][values][]"
                               class="form-control attribute-value mb-2" required>
                    </div>`;
                $(this).before(newValue);
            });
        });

        // Load subcategories function
        function loadSubcategories(categoryId) {
            if (!categoryId) {
                $('#subcategory_id').prop('disabled', true).empty().append(
                    '<option value=""> اخر القسم الفرعي</option>');
                return;
            }

            $('#subcategory_id').prop('disabled', false);
            $.ajax({
                url: '{{ route('getSubcategories') }}',
                method: 'GET',
                data: {
                    category_id: categoryId
                },
                success: function(response) {
                    $('#subcategory_id').empty().append('<option value=""> اختر القسم الفرعي</option>');
                    $.each(response.subcategories, function(key, subcategory) {
                        $('#subcategory_id').append(
                            `<option value="${subcategory.id}">${subcategory.name}</option>`);
                    });
                    $('#subcategory_id').append('<option value="other">غير</option>');

                    // Preselect the current subcategory
                    const currentSubcategoryId = '{{ $product->subcategory_id }}';
                    if (currentSubcategoryId) {
                        $('#subcategory_id').val(currentSubcategoryId);
                    }
                }
            });
        }

        window.existingVariants = {!! json_encode(
            $product->variants->map(function ($variant) {
                return [
                    'id' => $variant->id,
                    'combination' => $variant->combination, // JSON string
                ];
            }),
        ) !!};

        function isDeepEqual(obj1, obj2) {
            const keys1 = Object.keys(obj1);
            const keys2 = Object.keys(obj2);
            if (keys1.length !== keys2.length) return false;

            return keys1.every(key => obj2.hasOwnProperty(key) && obj1[key] === obj2[key]);
        }


        // Generate variants function
        window.generateVariants = function() {
            const attributes = {};

            $('.attribute').each(function() {
                const name = $(this).find('.attribute-name').val().trim();
                const values = $(this).find('.attribute-value').map(function() {
                    return $(this).val().trim();
                }).get().filter(Boolean);

                if (name && values.length) {
                    attributes[name] = values;
                }
            });

            const combinations = generateCombinations(attributes);
            const container = document.getElementById('variant-container');
            container.innerHTML = '';

            combinations.forEach((combo, i) => {

                const existingVariant = (window.existingVariants || []).find(v => {
                    try {
                        const existingCombo = JSON.parse(v.combination);
                        return isDeepEqual(existingCombo, combo);
                    } catch (e) {
                        return false;
                    }
                });


                const variantIdInput = existingVariant ?
                    `<input type="hidden" class="variant-id" value="${existingVariant.id}">` :
                    '';

                const comboText = Object.entries(combo)
                    .map(([k, v]) => `<strong>${k}</strong>: ${v}`)
                    .join(' | ');

                container.insertAdjacentHTML('beforeend', `
            <div class="row">
                <div class="col-md-6">
                    <div class="variant-item p-3 mb-3 border rounded shadow-sm variant-row"

                         data-attributes='${JSON.stringify(combo)}'>
                        ${variantIdInput}
                        <p>${comboText}</p>
                        <div class="form-group mb-2">
                            <label>السعر</label>
                            <input type="number" style="text-align: right" class="form-control variant-price" style="text-align: right" required>
                        </div>
                        <div class="form-group mb-2">
                            <label>الكمية</label>
                            <input type="number" class="form-control variant-quantity" style="text-align: right" required>
                        </div>
                        <div class="form-group mb-2">
                            <label>الصورة</label>
                            <input type="file" class="form-control variant-image">
                        </div>
                    </div>
                </div>
            </div>
        `);
            });
        };


        // Combination generator
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
                for (const value of attributes[key]) {
                    current[key] = value;
                    helper(index + 1, current);
                }
            }

            helper(0, {});
            return combinations;
        }

        // Remove image function
        function removeImage(imageId) {
            if (confirm('Are you sure you want to remove this image?')) {
                axios.delete(`/vendor/product-images/${imageId}`)
                    .then(response => {
                        $(`[data-image-id="${imageId}"]`).remove();
                        toastr.success('تم ازالة الصورة بنجاح');
                    })
                    .catch(error => {
                        toastr.error('حدث خطأ اثناء ازالة الصورة');
                    });
            }
        }

        // Update product function
        function updateProduct() {
            const form = document.getElementById("edit_product");
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

                // اسم موجود بدون قيم
                if (name !== "" && values.length === 0) {
                    validationFailed = true;
                    errorMessage = `Attribute #${idx + 1}: يرجى ادخال قيم للسمة`;
                }

                // قيم موجودة بدون اسم
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

            formData.append('attributes', JSON.stringify(attributes));

            // ✅ إضافة التركيبات (variants)
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

                const variantIdInput = row.querySelector('.variant-id');
                if (variantIdInput) {
                    formData.append(`variants[${i}][id]`, variantIdInput.value);
                }
            });

            // ✅ إرسال التحديث
            update('/vendor/products/' + {{ $product->id }}, formData)
                .then(() => {
                    toastr.success('تم تحديث المنتج بنجاح');
                    setTimeout(() => {
                        window.location.href = '{{ route('vendor.products.index') }}';
                    }, 1500);
                })
                .catch(error => {
                    console.error("حدث خطأ في تحديث المنتج:", error);
                    toastr.error('حدث خطأ في تحديث المنتج');
                });
        }
    </script>
@endsection
