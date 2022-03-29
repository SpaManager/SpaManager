$(document).ready(function($){
    $('#mensage').hide();

    $('$readBtn').click(function(){
        $('#intro').hide();
        $('#mensage').show('slow');
        });
    });
// jQuery('document').ready(function($){
//     var menuBtn = $('.menu-icon'),
//         menu = $('.navigation ul');

//     menuBtn.click(function(){
//         if (menu.hasClass('show')){
//             menu.removeClass('show');
//         }else{
//             menu.addClass('show');
//         }
//     });
// });
// $(document).ready(function(){
//     var imgItems = $('.slider li').length;
//     var imgPosition = 1;
//     for(i=1;i<=imgItems;i++){
//         $('.pagination').append('<li><span class="fa fa-circle"></span></li>');
//     }

//     $('.slider li').hide();
//     $('.slider li:first').show();
//     $('.pagination li:first').css({'color':'#de3c82f3'});

//     $('.pagination li').click(pagination);
//     $('.right span').click(nextSlider);
//     $('.left span').click(prevSlider);

//     setInterval(function(){
//         nextSlider();
//     },4000);


//     function pagination(){
//         var paginationPosition = $(this).index()+1;
//         $('.slider li').hide();
//         $('.slider li:nth-child('+ paginationPosition+')').fadeIn();
        
//         $('.pagination li').css({'color':'rgba(204, 204, 204, 0.815)'})
//         $(this).css({'color':'#de3c82f3'})

//         imgPosition=paginationPosition;
//     }

//     function nextSlider(){
//         if(imgPosition>=imgItems){
//             imgPosition=1
//         }else{
//             imgPosition++;
//         }
//         $('.pagination li').css({'color':'rgba(204, 204, 204, 0.815)'});
//         $('.pagination li:nth-child('+imgPosition+')').css({'color':'#de3c82f3'});
//         $('.slider li').hide();
//         $('.slider li:nth-child('+imgPosition+')').fadeIn();
//     }

//     function prevSlider(){
//         if(imgPosition<=1){
//             imgPosition=imgItems;
//         }else{
//             imgPosition--;
//         }
//         $('.pagination li').css({'color':'rgba(204, 204, 204, 0.815)'});
//         $('.pagination li:nth-child('+imgPosition+')').css({'color':'#de3c82f3'});
//         $('.slider li').hide();
//         $('.slider li:nth-child('+imgPosition+')').fadeIn();
//     }


// });