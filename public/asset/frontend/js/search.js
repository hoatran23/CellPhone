let perPage = 10;
let idPage = 1;
let start = 0;
let end = perPage;



const btnNext = document.querySelector('.page-btn-next');
const btnPrev = document.querySelector('.page-btn-prev');

// const products = []
let products = document.getElementsByClassName('product-counter');

let totalPages = Math.ceil(products.length / perPage);
console.log(products);
console.log(products.length, totalPages);

// function renderProduct() {
//     html = '';
//     const content = products.map((item, index) => {
//         if (index >= start && index < end) {
//             html += '<div class="product__custom-list bg-white text-center">';
//             html += '<div class="product__custom bg-white text-center">';
//             html += '<div class="product__custom-content">';
//             html += '<div class="product-img">';
//             html += '<img src=' + item.image + ' class="lazy mt-3 mb-3" alt=' + item.name + ' />';
//             html += '</div>';
//             html += '<div class="product-btns">';
//             html += '<a href="cart.html" class="btn-cart"> Thêm vào giỏ <br>';
//             html += '<span><i class="fas fa-plus"></i></span></a>';
//             html += '<a href="detail.html" class="btn-buy"> Xem ngay <br><span><i class="fas fa-shopping-cart"></i></span></a><span>39 đánh giá</span>';
//             html += '</div></div>';
//             html += '<a href="detail.html">';
//             html += '<div class="title">';
//             html += '<h3 class="m-0">' + item.name + '</h3></div>';
//             html += '<div class="price"><b>' + item.price + '</b></div>';
//             html += '</a>';
//             html += '<div class="ratingresult"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
//             html += '<span>39 đánh giá</span></div></div></div>';
//             return html;
//         }
//     })

//     document.getElementById('products').innerHTML = html;
// }
// renderProduct();

function renderProduct() {
    for (let i = 0; i < products.length; i++) {
        $('.product-counter').addClass('hidden');
        
    }
    for(let i=0; i<products.length;i++){
        if (i >= start && i < end) {
            $(`.product-counter:eq(${i})`).removeClass('hidden');
        }
    }


}
renderProduct();

function renderListPage(totalPages) {
    let html = '';
    html += `<li class="current-page active"><a>${1}</a></li>`;
    for (let i = 2; i <= totalPages; i++) {
        html += `<li><a>${i}</a></li>`;
    }
    if (totalPages === 0) {
        html = ''
    }
    document.getElementById('number-page').innerHTML = html;
}
renderListPage(totalPages);

function getCurrentPage(idPage) {
    start = (idPage - 1) * perPage;
    end = idPage * perPage;
}

function changePage() {
    const currentPage = document.querySelectorAll('.number-page li');
    // const a = document.querySelectorAll('.number-page li a');
    for (let i = 0; i < currentPage.length; i++) {
        currentPage[i].addEventListener('click', () => {
            let value = i + 1;
            $('.number-page li').removeClass('active')
            currentPage[i].classList.add('active');
            if (value === 1) {
                $('.page-btn-prev').addClass('page-btn-active');
                $('.page-btn-next').removeClass('page-btn-active');
            }
            if (value === totalPages) {
                $('.page-btn-next').addClass('page-btn-active');
                $('.page-btn-prev').removeClass('page-btn-active');
            }
            if (value != 1 && value != totalPages) {
                $('.page-btn-next').removeClass('page-btn-active');
                $('.page-btn-prev').removeClass('page-btn-active');
            }
            idPage = value;
            getCurrentPage(idPage);
            renderProduct();
        })
    }
}
changePage();


btnNext.addEventListener('click', () => {
    idPage++;
    if (idPage > totalPages) {
        idPage = totalPages
    }
    if (idPage === totalPages) {
        $('.page-btn-next').addClass('page-btn-active');
    }
    $('.page-btn-prev').removeClass('page-btn-active');
    $('.number-page li').removeClass('active');
    $(`.number-page li:eq(${idPage - 1})`).addClass('active');
    getCurrentPage(idPage);
    renderProduct();
})

btnPrev.addEventListener('click', () => {
    idPage--;
    if (idPage <= 1) {
        idPage = 1;
    }
    if (idPage === 1) {
        $('.page-btn-prev').addClass('page-btn-active');
    }
    $('.page-btn-next').removeClass('page-btn-active');
    $('.number-page li').removeClass('active');
    $(`.number-page li:eq(${idPage - 1})`).addClass('active');
    getCurrentPage(idPage);
    renderProduct();
})