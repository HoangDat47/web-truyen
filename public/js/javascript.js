$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 20,
    autoplay: true,
    dots: false,
    nav: false,
    // autoplayTimeout: 5000,
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 4
        },
        1000: {
            items: 6
        }
    }
})
/*scroll to top*/
//Khi người dùng cuộn chuột thì gọi hàm scrollFunction
window.onscroll = function() {scrollFunction()};
// khai báo hàm scrollFunction
function scrollFunction() {
    // Kiểm tra vị trí hiện tại của con trỏ so với nội dung trang
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        //nếu lớn hơn 20px thì hiện button
        document.getElementById("myBtn").style.display = "block";
    } else {
         //nếu nhỏ hơn 20px thì ẩn button
        document.getElementById("myBtn").style.display = "none";
    }
}
//gán sự kiện click cho button
document.getElementById('myBtn').addEventListener("click", function(){
    //Nếu button được click thì nhảy về đầu trang
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
});




// /* start dropdown */
// $(document).ready(function() {
//     $('.dropdown-toggle').mouseover(function() {
//         $('.dropdown-menu').show();
//     })
//     $('.dropdown-toggle').mouseout(function() {
//         t = setTimeout(function() {
//             $('.dropdown-menu').hide();
//         }, 100);

//         $('.dropdown-menu').on('mouseenter', function() {
//             $('.dropdown-menu').show();
//             clearTimeout(t);
//         }).on('mouseleave', function() {
//             $('.dropdown-menu').hide();
//         })
//     })
// })
/* end dropdown */