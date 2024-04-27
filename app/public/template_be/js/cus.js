
//console.log('oke');

  CKEDITOR.replace('editor');

  
    
    // $("#status").click( function (e){
    // //   $.ajax({url: "demo_test.txt", success: function(result){
    // //     $("#div1").html(result);
    // //   }});
    // e.preventDefault();
    // alert("oke");
    // //console.log('oke');
    // // var status = $('#status').val();
    // // alert(status);
    // });

  $(document).ready(function () {
    $('#myTable').DataTable({
      pageLength: 5,
      lengthMenu: [5, 10, 25, 50, 75, 100],
      stateSave: true}
    )});

    // $(document).on('click','#button', function(){
    //     //e.preventDefault();
        
    //     var id_category = $this.val();
        
    //     alert(id_category)
    //   });

      $(document).ready(function(){
        $("#button").click(function(e){
          e.preventDefault();
          alert("ok");
        });
      });
    
     