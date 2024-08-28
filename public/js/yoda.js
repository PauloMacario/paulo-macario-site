function getYodaSwal(linkImg, title, text)
{

    Swal.fire({
        title: title,
        text: text,
        icon: "info",
        confirmButtonText: 'Fechar'
    }) 

    $('.swal2-icon').each(function(){

        for (child of this.children){
            child.remove();
        }

        $(this).append('<img src="'+linkImg+'" style="border-radius:50%;">')
      
    })
}