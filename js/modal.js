$('.addBtn').on('click',()=>{
    $('.addModalBackground').fadeIn(500);
});

$('.btnCancelAdd').on('click',()=>{
    $('.addModalBackground').fadeOut(500);
})

$('.btnShowProfile').on('click', ()=>{
    $('.profileModalBackground').fadeIn(500);
});

$('.btnCancelEdit').on('click',()=>{
    $('.profileModalBackground').fadeOut(500);
})