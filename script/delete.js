function toDelete(){
  swal({
    title: "Are you sure?",
    text: "Some description",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, please redirect the page!",
    closeOnConfirm: false
}, function() {
  location.href="./views/menus_view.php"
});
    }