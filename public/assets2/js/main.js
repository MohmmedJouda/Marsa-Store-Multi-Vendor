// ======== المتغيرات العامة + تحميل من localStorage ========
let cartData = JSON.parse(localStorage.getItem("cartData")) || [];
let favoritesData = new Map(JSON.parse(localStorage.getItem("favoritesData"))) || new Map();
let cartCount = cartData.length;
let favCount = favoritesData.size;

document.getElementById("cart-count").textContent = cartCount;
document.getElementById("fav-count").textContent = favCount;

// ======== تأثير +1 عند إضافة للسلة ========
function animateCartPlusOne(e) {
  const rect = e.target.getBoundingClientRect();
  const floatEl = document.createElement("div");
  floatEl.classList.add("cart-float");
  floatEl.textContent = "+1";
  floatEl.style.left = `${rect.left}px`;
  floatEl.style.top = `${rect.top - 10 + window.scrollY}px`;
  document.body.appendChild(floatEl);
  setTimeout(() => floatEl.remove(), 800);
}





// ++++++++++++++++++

  document.addEventListener("DOMContentLoaded", () => {
    const fadeElements = document.querySelectorAll(".fade-in-up");

    const reveal = () => {
      fadeElements.forEach(el => {
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight - 100) {
          el.classList.add("show");
        }
      });
    };

    reveal(); // تشغيلها أول مرة
    window.addEventListener("scroll", reveal);
  });

// ++++++++++++++++++


// ======== التعامل مع زر الإضافة للسلة في البطاقات ========
document.querySelectorAll(".cart").forEach((btn) => {
  btn.addEventListener("click", (e) => {
    const card = btn.closest(".product-card");
    const id = card.dataset.id;
    const title = card.querySelector(".title").textContent;
    const price = parseFloat(card.querySelector(".price").textContent.replace("$", ""));
    const img = card.querySelector("img").src;
    const seller = card.querySelector(".seller span").textContent;

    cartData.push({ id, title, price, img, seller });
    cartCount = cartData.length;
    document.getElementById("cart-count").textContent = cartCount;
    localStorage.setItem("cartData", JSON.stringify(cartData));

    animateCartPlusOne(e);
    renderCart();
  });
});

function updateCartCount() {
  document.getElementById("cart-count").textContent = cartData.length;
}


// ======== عرض محتوى السلة ========
function renderCart() {
  const cartItems = document.getElementById("cart-items");
  const cartTotal = document.getElementById("cart-total");
  cartItems.innerHTML = "";
  let total = 0;

  cartData.forEach((item) => {
    total += item.price;
    const div = document.createElement("div");
    div.className = "cart-item";
    div.innerHTML = `
      <input type="checkbox" class="select-item" data-id="${item.id}">
      <img src="${item.img}" alt="">
      <div class="cart-info">
        <h4 class="cart-title">${item.title}</h4>
        <div class="price">$${item.price.toFixed(2)}</div>
        <div class="seller">البائع: ${item.seller}</div>
      </div>
      <div class="cart-controls">
        <i class="fa-solid fa-trash delete" data-id="${item.id}"></i>
      </div>
    `;
    cartItems.appendChild(div);
  });


   updateCartCount(); 



  cartTotal.textContent = total.toFixed(2);
  document.getElementById("cart-count").textContent = cartData.length;

  document.querySelectorAll(".delete").forEach((btn) => {
    btn.addEventListener("click", () => {
      const id = btn.dataset.id;
      cartData = cartData.filter((item) => item.id !== id);
      localStorage.setItem("cartData", JSON.stringify(cartData));
      renderCart();
      function updateCartCount() {
  document.getElementById("cart-count").textContent = cartData.length;
}

    });
  });
}

// ======== التعامل مع المفضلة ========
document.querySelectorAll(".btn-fav").forEach((btn) => {
  btn.addEventListener("click", () => {
    const card = btn.closest(".product-card");
    const id = card.dataset.id;
    const title = card.querySelector(".title").textContent;
    const price = parseFloat(card.querySelector(".price").textContent.replace("$", ""));
    const img = card.querySelector("img").src;
    const seller = card.querySelector(".seller span").textContent;

    if (favoritesData.has(id)) {
      favoritesData.delete(id);
      btn.classList.remove("active");
    } else {
      favoritesData.set(id, { id, title, price, img, seller });
      btn.classList.add("active");
    }

    favCount = favoritesData.size;
    document.getElementById("fav-count").textContent = favCount;
    localStorage.setItem("favoritesData", JSON.stringify([...favoritesData]));
    renderFavorites();
  });
});

// ======== عرض المفضلة ========
function renderFavorites() {
  const favContainer = document.getElementById("fav-items");
  favContainer.innerHTML = "";

  favoritesData.forEach((item) => {
    const div = document.createElement("div");
    div.className = "fav-item";
    div.dataset.id = item.id;
    div.innerHTML = `
      <img src="${item.img}" alt="">
      <div class="fav-info">
        <h4>${item.title}</h4>
        <div class="price">$${item.price.toFixed(2)}</div>
        <div class="seller">البائع: ${item.seller}</div>
      </div>
      <div class="fav-controls">
        <i class="fa-solid fa-cart-shopping move-to-cart ${cartData.find(c => c.id === item.id) ? 'in-cart' : ''}" title="نقل إلى السلة"></i>
        <i class="fa-solid fa-trash remove-fav" title="إزالة من المفضلة"></i>
      </div>
    `;
    favContainer.appendChild(div);
  });

  document.querySelectorAll(".remove-fav").forEach((icon) => {
    icon.addEventListener("click", (e) => {
      const itemEl = e.target.closest(".fav-item");
      const id = itemEl.dataset.id;
      favoritesData.delete(id);
      document.querySelector(`.product-card[data-id='${id}'] .btn-fav`)?.classList.remove("active");
      document.getElementById("fav-count").textContent = favoritesData.size;
      localStorage.setItem("favoritesData", JSON.stringify([...favoritesData]));
      renderFavorites();
    });
  });

  document.querySelectorAll(".move-to-cart").forEach((btn) => {
    btn.addEventListener("click", () => {
      const itemEl = btn.closest(".fav-item");
      const id = itemEl.dataset.id;
      const existingItem = cartData.find(item => item.id === id);

      if (existingItem) {
        cartData = cartData.filter(item => item.id !== id);
        btn.classList.remove("in-cart");
      } else {
        const favItem = favoritesData.get(id);
        cartData.push(favItem);
        btn.classList.add("in-cart");
      }

      localStorage.setItem("cartData", JSON.stringify(cartData));
      document.getElementById("cart-count").textContent = cartData.length;
      renderCart();
    });
  });
}

// ======== أوامر تحكم واجهة السلة والمفضلة ========
document.getElementById("cart-icon").addEventListener("click", () => {
  const cartPanel = document.getElementById("cart-panel");
  const favPanel = document.getElementById("fav-panel");
  const isVisible = cartPanel.style.display === "block";
  cartPanel.style.display = isVisible ? "none" : "block";
  favPanel.style.display = "none";
});

document.getElementById("fav-icon").addEventListener("click", () => {
  const panel = document.getElementById("fav-panel");
  panel.style.display = panel.style.display === "block" ? "none" : "block";
});

document.getElementById("close-cart").addEventListener("click", () => {
  document.getElementById("cart-panel").style.display = "none";
});

document.getElementById("close-fav").addEventListener("click", () => {
  document.getElementById("fav-panel").style.display = "none";
});

document.querySelector(".clear-fav")?.addEventListener("click", () => {
  favoritesData.clear();
  favCount = 0;
  document.getElementById("fav-count").textContent = 0;
  document.querySelectorAll(".btn-fav").forEach((btn) => btn.classList.remove("active"));
  localStorage.setItem("favoritesData", JSON.stringify([...favoritesData]));
  renderFavorites();
});

function openModal() {
  document.getElementById("customModal").style.display = "block";
}
function closeModal() {
  document.getElementById("customModal").style.display = "none";
}


document.addEventListener("DOMContentLoaded", function () {
  const buyButtons = document.querySelectorAll("button, a");

  buyButtons.forEach(button => {
    const btnText = button.innerText.trim();
    if (btnText === "شراء الآن" || btnText.toLowerCase() === "buy now") {
      button.addEventListener("click", function (e) {
        e.preventDefault(); // نمنع التنقل أو تنفيذ الحدث الأصلي
        openModal();
      });
    }
  });
});







function updateFavAndCartIcons() {
  // تحديث أزرار المفضلة
  document.querySelectorAll(".product-card").forEach(card => {
    const id = card.dataset.id;
    const favBtn = card.querySelector(".btn-fav");
    const cartBtn = card.querySelector(".cart");

    if (favoritesData.has(id)) {
      favBtn?.classList.add("active");
    } else {
      favBtn?.classList.remove("active");
    }

    if (cartData.find(item => item.id === id)) {
      cartBtn?.classList.add("in-cart");
    } else {
      cartBtn?.classList.remove("in-cart");
    }
  });
}

document.addEventListener("DOMContentLoaded", function () {
  updateFavAndCartIcons(); // <-- يتم استدعاؤها مباشرةً بعد تحميل الصفحة
});






document.getElementById("select-all")?.addEventListener("change", function () {
  const checkboxes = document.querySelectorAll(".select-item");
  checkboxes.forEach(cb => cb.checked = this.checked);
});


 document.querySelectorAll('.slider-wrapper').forEach(sliderWrapper => {
    const slider = sliderWrapper.querySelector('.slider-container');
    const leftBtn = sliderWrapper.querySelector('.slideLeft');
    const rightBtn = sliderWrapper.querySelector('.slideRight');

    if (leftBtn && rightBtn && slider) {
      leftBtn.addEventListener('click', () => {
        slider.scrollBy({ left: -300, behavior: 'smooth' });
      });

      rightBtn.addEventListener('click', () => {
        slider.scrollBy({ left: 300, behavior: 'smooth' });
      });
    }
  });



  
  // احصل على جميع العناصر المحددة
  function getSelectedItems() {
    return Array.from(document.querySelectorAll('.select-item:checked'))
      .map(checkbox => checkbox.closest('.cart-item'));
  }

  // حذف المحدد
// حذف المحدد
// document.getElementById('delete-selected')?.addEventListener('click', () => {
//   const selectedCheckboxes = document.querySelectorAll('.select-item:checked');
//   if (selectedCheckboxes.length === 0) return alert('لم يتم تحديد أي منتج');

//   const selectedIds = Array.from(selectedCheckboxes).map(cb => cb.dataset.id);
//   cartData = cartData.filter(item => !selectedIds.includes(item.id));
//   localStorage.setItem("cartData", JSON.stringify(cartData));
//   renderCart(); // <-- نعيد رسم السلة بعد الحذف
// });


  // شراء المحدد
  document.getElementById('buy-selected')?.addEventListener('click', () => {
    const selected = getSelectedItems();
    if (selected.length === 0) return alert('يرجى تحديد المنتجات المراد شراؤها');
    const productNames = selected.map(item => item.querySelector('.product-title')?.textContent.trim());
    alert(`سيتم شراء المنتجات التالية:\n${productNames.join('\n')}`);
    // هنا أضف منطق إرسال الطلب أو إفراغ السلة أو غيره
  });
