let perPage = 10;
let idPage = 0;
let start = 0;
let end = perPage;

//Sản phẩm hot
let productHot = [
    { id: 1, image: "img/iphone/ip-12-pm-gold/1.png", name: "iPhone 12 Pro Max 128GB", price: "31.690.000₫" },
    { id: 2, image: "img/samsung/s21-ultra/1.png", name: "Samsung S21 Ultra", price: "21.690.000₫" },
    { id: 3, image: "img/sony/xperia-x1-ii/1.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 4, image: "img/xiaomi/mi-11-5g/1.png", name: "Xiaomi Mi 11 5G", price: "18.690.000₫" },
    { id: 5, image: "img/iphone/ip-12-pm-gold/2.png", name: "iPhone 12 Pro Max 128GB", price: "31.690.000₫" },
    { id: 6, image: "img/samsung/s21-ultra/2.png", name: "Samsung S21 Ultra", price: "21.690.000₫" },
    { id: 7, image: "img/sony/xperia-x1-ii/2.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 8, image: "img/sony/xperia-x1-ii/3.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 9, image: "img/xiaomi/mi-11-5g/3.png", name: "Xiaomi Mi 11 5G", price: "18.690.000₫" },
    { id: 10, image: "img/sony/xperia-x1-ii/4.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
];
//Sản phẩm mới về
let productNew = [
    { id: 1, image: "img/iphone/ip-12-pm-gold/1.png", name: "iPhone 12 Pro Max 128GB", price: "31.690.000₫" },
    { id: 2, image: "img/samsung/s21-ultra/1.png", name: "Samsung S21 Ultra", price: "21.690.000₫" },
    { id: 3, image: "img/sony/xperia-x1-ii/1.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 4, image: "img/xiaomi/mi-11-5g/1.png", name: "Xiaomi Mi 11 5G", price: "18.690.000₫" },
    { id: 5, image: "img/iphone/ip-12-pm-gold/2.png", name: "iPhone 12 Pro Max 128GB", price: "31.690.000₫" },
    { id: 6, image: "img/samsung/s21-ultra/2.png", name: "Samsung S21 Ultra", price: "21.690.000₫" },
    { id: 7, image: "img/sony/xperia-x1-ii/2.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 8, image: "img/sony/xperia-x1-ii/3.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 9, image: "img/xiaomi/mi-11-5g/3.png", name: "Xiaomi Mi 11 5G", price: "18.690.000₫" },
    { id: 10, image: "img/sony/xperia-x1-ii/4.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
];
//Danh mục sản phẩm
//tất cả sản phẩm
let product0 = [
    { id: 1, image: "img/iphone/ip-12-pm-gold/1.png", name: "iPhone 12 Pro Max 128GB", price: "31.690.000₫" },
    { id: 2, image: "img/samsung/s21-ultra/1.png", name: "Samsung S21 Ultra", price: "21.690.000₫" },
    { id: 3, image: "img/sony/xperia-x1-ii/1.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 4, image: "img/xiaomi/mi-11-5g/1.png", name: "Xiaomi Mi 11 5G", price: "18.690.000₫" },
    { id: 5, image: "img/iphone/ip-12-pm-gold/2.png", name: "iPhone 12 Pro Max 128GB", price: "31.690.000₫" },
    { id: 6, image: "img/samsung/s21-ultra/2.png", name: "Samsung S21 Ultra", price: "21.690.000₫" },
    { id: 7, image: "img/sony/xperia-x1-ii/2.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 8, image: "img/sony/xperia-x1-ii/3.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 9, image: "img/xiaomi/mi-11-5g/3.png", name: "Xiaomi Mi 11 5G", price: "18.690.000₫" },
    { id: 10, image: "img/sony/xperia-x1-ii/4.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
];
//1: Iphone
let product1 = [
    { id: 1, image: "img/iphone/ip-12-pm-gold/1.png", name: "iPhone 12 Pro Max 128GB", price: "31.690.000₫" },
    { id: 2, image: "img/iphone/ip-12-pm-gold/1.png", name: "iPhone 12 Pro Max 128GB", price: "31.690.000₫" },
    { id: 3, image: "img/iphone/ip-12-pm-gold/1.png", name: "iPhone 12 Pro Max 128GB", price: "31.690.000₫" },
    { id: 4, image: "img/iphone/ip-12-pm-gold/1.png", name: "iPhone 12 Pro Max 128GB", price: "31.690.000₫" },
    { id: 5, image: "img/iphone/ip-12-pm-gold/1.png", name: "iPhone 12 Pro Max 128GB", price: "31.690.000₫" },
    { id: 6, image: "img/iphone/ip-12-pm-gold/1.png", name: "iPhone 12 Pro Max 128GB", price: "31.690.000₫" },
    { id: 7, image: "img/iphone/ip-12-pm-gold/1.png", name: "iPhone 12 Pro Max 128GB", price: "31.690.000₫" },
    { id: 8, image: "img/iphone/ip-12-pm-gold/1.png", name: "iPhone 12 Pro Max 128GB", price: "31.690.000₫" },
    { id: 9, image: "img/iphone/ip-12-pm-gold/1.png", name: "iPhone 12 Pro Max 128GB", price: "31.690.000₫" },
    { id: 10, image: "img/iphone/ip-12-pm-gold/1.png", name: "iPhone 12 Pro Max 128GB", price: "31.690.000₫" },
];
//2: Samsung
let product2 = [
    { id: 1, image: "img/samsung/s21-ultra/1.png", name: "Samsung S21 Ultra", price: "21.690.000₫" },
    { id: 2, image: "img/samsung/s21-ultra/1.png", name: "Samsung S21 Ultra", price: "21.690.000₫" },
    { id: 3, image: "img/samsung/s21-ultra/1.png", name: "Samsung S21 Ultra", price: "21.690.000₫" },
    { id: 4, image: "img/samsung/s21-ultra/1.png", name: "Samsung S21 Ultra", price: "21.690.000₫" },
    { id: 5, image: "img/samsung/s21-ultra/1.png", name: "Samsung S21 Ultra", price: "21.690.000₫" },
    { id: 6, image: "img/samsung/s21-ultra/1.png", name: "Samsung S21 Ultra", price: "21.690.000₫" },
    { id: 7, image: "img/samsung/s21-ultra/1.png", name: "Samsung S21 Ultra", price: "21.690.000₫" },
    { id: 8, image: "img/samsung/s21-ultra/1.png", name: "Samsung S21 Ultra", price: "21.690.000₫" },
    { id: 9, image: "img/samsung/s21-ultra/1.png", name: "Samsung S21 Ultra", price: "21.690.000₫" },
    { id: 10, image: "img/samsung/s21-ultra/1.png", name: "Samsung S21 Ultra", price: "21.690.000₫" },
];
//3: Sony
let product3 = [
    { id: 1, image: "img/sony/xperia-x1-ii/1.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 2, image: "img/sony/xperia-x1-ii/1.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 3, image: "img/sony/xperia-x1-ii/1.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 4, image: "img/sony/xperia-x1-ii/1.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 5, image: "img/sony/xperia-x1-ii/1.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 6, image: "img/sony/xperia-x1-ii/1.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 7, image: "img/sony/xperia-x1-ii/1.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 8, image: "img/sony/xperia-x1-ii/1.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 9, image: "img/sony/xperia-x1-ii/1.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
    { id: 10, image: "img/sony/xperia-x1-ii/1.png", name: "Sony Xperia 5 II", price: "25.690.000₫" },
];
//4: Xiaomi
let product4 = [
    { id: 1, image: "img/xiaomi/mi-11-5g/1.png", name: "Xiaomi Mi 11 5G", price: "18.690.000₫" },
    { id: 2, image: "img/xiaomi/mi-11-5g/1.png", name: "Xiaomi Mi 11 5G", price: "18.690.000₫" },
    { id: 3, image: "img/xiaomi/mi-11-5g/1.png", name: "Xiaomi Mi 11 5G", price: "18.690.000₫" },
    { id: 4, image: "img/xiaomi/mi-11-5g/1.png", name: "Xiaomi Mi 11 5G", price: "18.690.000₫" },
    { id: 5, image: "img/xiaomi/mi-11-5g/1.png", name: "Xiaomi Mi 11 5G", price: "18.690.000₫" },
    { id: 6, image: "img/xiaomi/mi-11-5g/1.png", name: "Xiaomi Mi 11 5G", price: "18.690.000₫" },
    { id: 7, image: "img/xiaomi/mi-11-5g/1.png", name: "Xiaomi Mi 11 5G", price: "18.690.000₫" },
    { id: 8, image: "img/xiaomi/mi-11-5g/1.png", name: "Xiaomi Mi 11 5G", price: "18.690.000₫" },
    { id: 9, image: "img/xiaomi/mi-11-5g/1.png", name: "Xiaomi Mi 11 5G", price: "18.690.000₫" },
    { id: 10, image: "img/xiaomi/mi-11-5g/1.png", name: "Xiaomi Mi 11 5G", price: "18.690.000₫" },
];
//5: Vsmart
let product5 = [
    { id: 1, image: "img/sony/xperia-x1-ii/2.png", name: "Vsmart Joy 4", price: "10.690.000₫" },
    { id: 2, image: "img/sony/xperia-x1-ii/2.png", name: "Vsmart Joy 4", price: "10.690.000₫" },
    { id: 3, image: "img/sony/xperia-x1-ii/2.png", name: "Vsmart Joy 4", price: "10.690.000₫" },
    { id: 4, image: "img/sony/xperia-x1-ii/2.png", name: "Vsmart Joy 4", price: "10.690.000₫" },
    { id: 5, image: "img/sony/xperia-x1-ii/2.png", name: "Vsmart Joy 4", price: "10.690.000₫" },
    { id: 6, image: "img/sony/xperia-x1-ii/2.png", name: "Vsmart Joy 4", price: "10.690.000₫" },
    { id: 7, image: "img/sony/xperia-x1-ii/2.png", name: "Vsmart Joy 4", price: "10.690.000₫" },
    { id: 8, image: "img/sony/xperia-x1-ii/2.png", name: "Vsmart Joy 4", price: "10.690.000₫" },
    { id: 9, image: "img/sony/xperia-x1-ii/2.png", name: "Vsmart Joy 4", price: "10.690.000₫" },
    { id: 10, image: "img/sony/xperia-x1-ii/2.png", name: "Vsmart Joy 4", price: "10.690.000₫" },
];


//Render sản phẩm HOT nhất
function renderProductHot() {
    let html = '';
    const content = productHot.map((item, index) => {
        if (index >= start && index < end) {
            html += '<div class="swiper-slide" style="width:259.2px !important">';
            html += '<div class="product__custom bg-white text-center">';
            html += '<div class="product__custom-content">';
            html += '<div class="product-img">';
            html += '<img src=' + item.image + ' class="lazy mt-3 mb-3" alt=' + item.name + ' />';
            html += '</div>';
            html += '<div class="product-btns">';
            html += '<a href="cart.html" class="btn-cart"> Thêm vào giỏ <br>';
            html += '<span><i class="fas fa-plus"></i></span></a>';
            html += '<a href="detail.html" class="btn-buy"> Xem ngay <br><span><i class="fas fa-shopping-cart"></i></span></a>';
            html += '</div></div>';
            html += '<a href="detail.html">';
            html += '<div class="title">';
            html += '<h3 class="m-0">' + item.name + '</h3></div>';
            html += '<div class="price"><b>' + item.price + '</b></div>';
            html += '</a>';
            html += '<div class="ratingresult"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
            html += '<span>39 đánh giá</span></div></div></div>';
            return html;
        }
    })

    document.getElementById('product-hot').innerHTML = html;
}
// renderProductHot();



//Render sản phẩm nổi bật
function renderProductNew() {
    html = '';
    const content = productNew.map((item, index) => {
        if (index >= start && index < end) {
            html += '<div class="product__custom-list bg-white text-center">';
            html += '<div class="product__custom bg-white text-center">';
            html += '<div class="product__custom-content">';
            html += '<div class="product-img">';
            html += '<img src=' + item.image + ' class="lazy mt-3 mb-3" alt=' + item.name + ' />';
            html += '</div>';
            html += '<div class="product-btns">';
            html += '<a href="cart.html" class="btn-cart"> Thêm vào giỏ <br>';
            html += '<span><i class="fas fa-plus"></i></span></a>';
            html += '<a href="detail.html" class="btn-buy"> Xem ngay <br><span><i class="fas fa-shopping-cart"></i></span></a><span>39 đánh giá</span>';
            html += '</div></div>';
            html += '<a href="detail.html">';
            html += '<div class="title">';
            html += '<h3 class="m-0">' + item.name + '</h3></div>';
            html += '<div class="price"><b>' + item.price + '</b></div>';
            html += '</a>';
            html += '<div class="ratingresult"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
            html += '<span>39 đánh giá</span></div></div></div>';
            return html;
        }
    })

    document.getElementById('product-new').innerHTML = html;
}
// renderProductNew();

function renderProduct(value) {
    html = '';
    let product = [];
    switch (value) {
        case 0: product = product0; // Tat ca san pham
            break;
        case 1: product = product1; //Iphone
            break;
        case 2: product = product2; //Samsung
            break;
        case 3: product = product3; // Sony
            break;
        case 4: product = product4; // Xiaomi
            break;
        case 5: product = product5; // Vsmart
            break;
    }
    const content = product.map((item, index) => {
        if (index >= start && index < end) {
            html += '<div class="product__custom-list bg-white text-center">';
            html += '<div class="product__custom bg-white text-center">';
            html += '<div class="product__custom-content">';
            html += '<div class="product-img">';
            html += '<img src=' + item.image + ' class="lazy mt-3 mb-3" alt=' + item.name + ' />';
            html += '</div>';
            html += '<div class="product-btns">';
            html += '<a href="cart.html" class="btn-cart"> Thêm vào giỏ <br>';
            html += '<span><i class="fas fa-plus"></i></span></a>';
            html += '<a href="detail.html" class="btn-buy"> Xem ngay <br><span><i class="fas fa-shopping-cart"></i></span></a><span>39 đánh giá</span>';
            html += '</div></div>';
            html += '<a href="detail.html">';
            html += '<div class="title">';
            html += '<h3 class="m-0">' + item.name + '</h3></div>';
            html += '<div class="price"><b>' + item.price + '</b></div>';
            html += '</a>';
            html += '<div class="ratingresult"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
            html += '<span>39 đánh giá</span></div></div></div>';
            return html;
        }
    })

    document.getElementById('productss').innerHTML = html;
}
// renderProduct(idPage);

function getCurrentPage(idPage) {
    start = (idPage - 1) * perPage;
    end = idPage * perPage;
}

function changePage() {
    const currentPage = document.querySelectorAll('.filter');
    // const a = document.querySelectorAll('filter a');
    for (let i = 0; i < currentPage.length; i++) {
        currentPage[i].addEventListener('click', () => {
            $('.filter').removeClass('active')
            currentPage[i].classList.add('active');
            // getCurrentPage(idPage);
            // switch (i) {
            //     case 0: renderProduct(0); // Tat ca san pham
            //         break;
            //     case 1: renderProduct(1); //Iphone
            //         break;
            //     case 2: renderProduct(2); //Samsung
            //         break;
            //     case 3: renderProduct(3); // Sony
            //         break;
            //     case 4: renderProduct(4); // Xiaomi
            //         break;
            //     case 5: renderProduct(5); // Vsmart
            //         break;
            //     default: renderProduct(0);
            //         break;
            // }

        })
    }
}
changePage();