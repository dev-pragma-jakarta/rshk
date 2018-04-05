<div class="ui medium modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Media
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" method="post">
      <input type="hidden" name="action" value="create" enctype="multipart/dataForm">
      <input type="hidden" id="id_media_center" value="">
      <input type="hidden" id="form" value="">
      
      <div class="ui grid">
        <div class="six wide column">
          <div class="field image-container">
            <span class="image-preview" style="height: 20rem">Pilih Gambar</span>
            <div class="ui fluid file input action">
              <input type="text" readonly="">
              <input type="file" class="ten wide column" id="attachment" name="attachment[]" autocomplete="off" multiple="">
              <div class="ui blue button file">
                Cari...
              </div>
            </div>
          </div>
        </div>
        <div class="ten wide column">
          <div class="field">
            <label for="nama">Nama</label>
            <input type="text" name="nama_media_center" id="nama_media_center" placeholder="Judul media">
          </div>
          <div class="field">
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="5"></textarea>
          </div>
          <div class="field">
            <label for="">Tipe</label>
            <select name="filter[tipe]" id="id_tipe_media" class="ui dropdown selection">
              <option value="">Pilih tipe media</option>
              <option value="1">Event</option>
              <option value="2">Pengumuman</option>
              <option value="3">Misc</option>
            </select>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="actions">
    <div class="ui black deny button" id="btn_batal">
      Batal
    </div>
    <div class="ui positive right labeled icon button" id="btn_simpan">
      Simpan
      <i class="save icon"></i>
    </div>
  </div>
</div>