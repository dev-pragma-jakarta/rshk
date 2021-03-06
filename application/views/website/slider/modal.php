<div class="ui medium modal formUtama">
  <!-- <i class="close icon"></i> -->
  <div class="header">
    Form Slider
  </div>
  <div class="content">
    <form class="ui data form" id="dataForm" method="post">
      <input type="hidden" name="action" value="create" enctype="multipart/dataForm">
      <input type="hidden" id="id_slider" name="id_slider" value="">
      <input type="hidden" id="form" value="">
      
      <div class="ui grid">
        <div class="six wide column">
          <div class="field image-container">
            <span class="image-preview" style="height: 20rem"><img src="" name="image-preview" id="image-preview" style="width: 300px; height: 230px" /></span>
            <div class="ui fluid file input action">
              <input type="hidden" name="gambar_edit" id="gambar_edit">
              <input type="text" readonly="">
              <input type="file" class="ten wide column" id="attachment" name="attachment" autocomplete="off" multiple="">
              <div class="ui blue button file">
                Cari...
              </div>
            </div>
          </div>
          <!-- <div class="field">
            <select name="status" class="ui selection dropdown">
              <option value="">Pilih status</option>
              <option value="0">Draft</option>
              <option value="1">Published</option>
            </select>
          </div> -->
          <div class="ui grid" style="margin: 1rem 0">
            <label class="six wide column">Posisi</label>
            <div class="five wide column">
              <div class="ui radio checkbox">
                <input type="radio" class="position" name="posisi" checked="checked" value="Kiri">
                <label>Kiri</label>
              </div>
            </div>
            <div class="five wide column">
              <div class="ui radio checkbox">
                <input type="radio" class="position" name="posisi" value="Kanan">
                <label>Kanan</label>
              </div>
            </div>
          </div>
        </div>
        <div class="ten wide column">
          <div class="field">
            <label for="nama">Judul</label>
            <input type="text" name="judul" id="judul" placeholder="Judul media">
          </div>
          <div class="field">
            <label for="nama">Subjudul</label>
            <input type="text" name="sub_judul" id="sub_judul" placeholder="Subjudul media">
          </div>
          <div class="field">
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="5"></textarea>
          </div>
          <div class="field">
            <label for="nama">Link</label>
            <input type="text" name="link" id="link" placeholder="Link media">
            <input type="hidden" name="aksi" id="aksi">
          </div>
        </div>
      </div>
      <!-- error message -->
      <div class="ui error message">
        <ul class="list" id="msg_validation"></ul>
      </div>
    </form>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Batal
    </div>
    <div class="ui buttons">

      <input type="button" name="btn_draft" style="background-color: #21ba45 !important;color: #fff" id="btn_draft" class="ui button save as drafting" value="Draft">
      <div class="or"></div>
      <button type="button" name="btn_publish" style="background-color: #00b5ad !important;color: #fff" id="btn_publish" class="ui button save as publicity" value="Published">Publish</button>
    </div>
  </div>
</div>