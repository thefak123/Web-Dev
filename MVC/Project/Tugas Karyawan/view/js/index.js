$("#confirmForm #btnConfirm").on("click", function(e){
    const form = $("#confirmForm");
    
    $.post("", form.serialize(), function(response, status){
      
        if(status === "success"){

            Swal.fire({
                title: (value != "") ? 'Data berhasil diupdate' :'Data berhasil ditambahkan',
                confirmButtonText: 'Sippp',
                allowOutsideClick: false
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.reload();
                } 
                })
        }
    })
    
})

if(value != ""){
  
  const curObj = JSON.parse(value);

  curObj["id"] = id;
  var page = "";
  var name = "";

  if (window.location.href.indexOf("officeView") != -1) {
    page = "office";
    name = curObj["officeName"];
  }else if(window.location.href.indexOf("karyawanView") != -1){
    page = "karyawan";
    name = curObj["nama"];
  }else{
    page = "Relasi";
    name = "";
  }
  $("#formTitle").text("Update " + page + " " + name)
  if(page == "office" || page == "karyawan"){
    for (let key in curObj) {
      
      $("input[name='" + key + "']").val(curObj[key]);
    }
      
  }
  
}



$("#confirmDeleteForm #btnDeleteConfirm").on("click", function(e){
    const form = $(this).closest("#confirmDeleteForm");
    console.log(form);
    Swal.fire({
        title: "Confirmation",
        text: "Apakah anda yakin ingin menghapus data ini ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tetap hapus'
      }).then((result) => {
        if (result.isConfirmed) {
          $.post("", form.serialize(), function(response, status){
                if(status === "success"){
                    Swal.fire({
                        title: 'Data berhasil dihapus',
                        confirmButtonText: 'Sippp',
                        allowOutsideClick: false
                      }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            window.location =window.location.href.split("?")[0];
                        } 
                      })
                }
          })
        }
      })
});

