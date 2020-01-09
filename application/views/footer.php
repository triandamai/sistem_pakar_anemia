  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url()?>assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <!-- <script src="../node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
  <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
  <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script> -->

  <!-- Template JS File -->
  <script src="<?= base_url()?>assets/js/scripts.js"></script>
  <script src="<?= base_url()?>assets/js/custom.js"></script>

  <!-- Page Specific JS File
  <script src="<?= base_url() ?>/assets/js/page/index.js"></script> -->
  <script src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
  <script src="<?= base_url() ?>assets/ckfinder/ckfinder.js"></script>

  <script type="text/javascript">
 
    $(document).on("click", "#ubahGejala", function() {
      // var id = $(this).data('id');
      // console.log(id);
      $('input[name="kodegejala"]').val($(this).data('id'));
      $('input[name="id"]').val($(this).data('id'));
      $('input[name="namagejala"]').val($(this).data('nama'));
      $('textarea[name="deskripsigejala"]').val($(this).data('deskripsi'));
      // $('input[name="id"]').val(id);
    });

    $(document).on("click", "#ubahPenyakit", function() {
      $('input[name="kodepenyakit"]').val($(this).data('id'));
      $('input[name="id"]').val($(this).data('id'));
      $('input[name="namapenyakit"]').val($(this).data('nama'));
      $('textarea[name="deskripsipenyakit"]').val($(this).data('deskripsi'));
      $('textarea[name="solusipenyakit"]').val($(this).data('solusi'));
    });

    $(document).ready(() => {
 
      // const custom = new CustomLogging;
      // custom.setBodyStyle({ color: 'red' });
      // custom.log('Warning !! Ini adalah mode developer bijaklah dalam menggunakan tool ini');

      var btnGejala = $('#ubahGejala');
      let btnPenyakit = $('#ubahPenyakit');
      let btnHapusPenyakit = $('#hapusPenyakit');
      let btnHapusGejala = $('#hapusGejala');
      let btnDetailUser = $('#detailUser');


      // btnGejala.click(() => {
      // console.log(btnGejala.data('id'));
      // console.log(btnGejala.data('id'));

      // $('input[name="kodegejala"]').val(btnGejala.data('id'));
      // $('input[name="id"]').val(btnGejala.data('id'));
      // $('input[name="namagejala"]').val(btnGejala.data('nama'));
      // $('textarea[name="deskripsigejala"]').val(btnGejala.data('deskripsi'));

      // });

      btnPenyakit.click(() => {
        console.log($(this).data('id'));
        // $('input[name="kodepenyakit"]').val(btnPenyakit.data('id'));
        // $('input[name="id"]').val(btnPenyakit.data('id'));
        // $('input[name="namapenyakit"]').val(btnPenyakit.data('nama'));
        // $('textarea[name="deskripsipenyakit"]').val(btnPenyakit.data('deskripsi'));
        // $('textarea[name="solusipenyakit"]').val(btnPenyakit.data('solusi'));
      });

        btnHapusPenyakit.click(()=>{
         // console.log("hapus penyakit");
          $('#modalTitle').text("Apakah kamu yakin menghapus penyakit "+btnHapusPenyakit.data('nama')+" ?");
          $('input[name="kodepenyakit"]').val(btnHapusPenyakit.data('id'));
          

        });
        btnHapusGejala.click(()=>{
        //  console.log("hapus Gejala");
          $('#modalTitle').text("Apakah kamu yakin menghapus Gejala "+btnHapusGejala.data('nama')+" ?");
          $('input[name="kodegejala"]').val(btnHapusGejala.data('id'));
        });

        btnDetailUser.click(()=>{
        //  console.log("detail user");
          $('#username').text(btnDetailUser.data('username'));
          $('#email').text(btnDetailUser.data('email'));
          $('#created_at').text(btnDetailUser.data('created'));
          $('#updated_at').text(btnDetailUser.data('updated'));
        });
    });
 </script>
</body>
</html>
