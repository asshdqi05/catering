<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal_add">
                    <span class="fa fa-plus"></span>
                    Tambah Data
                </button>

            </div>

            <div class="card-body">
                <?php echo $this->session->flashdata('msg'); ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>ID Menu</th>
                        <th>Hari</th>
                        <th>Detail menu</th>
                        <th>Foto Menu</th>
                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($datamenu->result_array() as $d) { ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?php echo $d['id_menu_pesta'] ?></td>
                                <td><?php echo $d['hari'] ?></td>
                                <td><?php echo $d['detail_menu'] ?></td>
                                <td><img width="100" height="100" src="<?php echo base_url('foto/foto_menu/') . $d['foto_menu']; ?>"></td>
                                <td class="text-center" width="100px">
                                    <a href="javascript:void(0)" onclick="edit( '<?php echo $d['id_menu_pesta'] ?>',
                                                                                '<?php echo $d['hari'] ?>',
                                                                                '<?php echo $d['detail_menu'] ?>',
                                                                                '<?php echo $d['foto_menu'] ?>')">
                                        <i class="fa fa-pencil" style="color: #3c763d"></i>
                                    </a>
                                    <a href="javascript:void(0)" onclick="hapus('<?php echo $d['id_menu_pesta'] ?>','<?php echo $d['hari'] ?>','<?php echo $d['foto_menu'] ?>')">
                                        <i class="fa fa-trash" style="color: #ea6565"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    function edit(kode, hari, detail, foto) {
        $('#ekode').val(kode);
        $('#ehari').val(hari);
        $('#edetail').val(detail);
        $('#efoto').val(foto);
        $('#edit_data').modal('show');
    }

    function hapus(kode, nama, foto) {
        $('#hkode').val(kode);
        $('#hnama').html(nama);
        $('#hfoto').val(foto);
        $('#hapus_data').modal('show');
    }
</script>

<div class="modal fade" id="modal_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Data menu Makanan</h4>
                <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="POST" enctype="multipart/form-data" action="<?php echo site_url('C_menu_pesta/add') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Hari</label>
                        <select name="hari" id="" class="form-control">
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jum'at</option>
                            <option value="sabtu">Sabtu</option>
                            <option value="minggu">Minggu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Detail menu</label>
                        <textarea name="detail_menu" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Foto Menu</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="icon-floppy-disk"></i> Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cross2"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="edit_data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data menu</h4>
            </div>
            <form role="form" method="POST" enctype="multipart/form-data" action="<?php echo site_url('C_menu_pesta/edit') ?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Hari</label>
                        <select name="hari" id="ehari" class="form-control">
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jum'at</option>
                            <option value="sabtu">Sabtu</option>
                            <option value="minggu">Minggu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Detail menu</label>
                        <input type="hidden" name="kode" id="ekode" class="form-control">
                        <input type="text" name="detail_menu" id="edetail" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Foto Menu</label>
                        <input type="file" name="foto" class="form-control">
                        <input type="text" name="old_foto" id="efoto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="icon-floppy-disk"></i> Edit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cross2"></i> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('C_menu_pesta/delete') ?>">
                <div class="modal-body">
                    <input type="hidden" name="kode" id="hkode">
                    <input type="hidden" name="foto" id="hfoto">
                    Anda yakin hapus data <strong><span id="hhari"></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="icon-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-cross2"></i>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>