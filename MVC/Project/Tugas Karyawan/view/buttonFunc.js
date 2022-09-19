$("#confirmForm #btnConfirm").on("click", function(e){
    const form = $("#confirmForm");
    
    $.post("", form.serialize(), function(response, status){
        if(status === "success"){
            Swal.fire({
                title: 'Data berhasil ditambahkan',
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

$("#confirmDeleteForm #btnDeleteConfirm").on("click", function(e){
    const form = $("#confirmDeleteForm");
    
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
                            window.location.reload();
                        } 
                      })
                }
          })
        }
      })
});