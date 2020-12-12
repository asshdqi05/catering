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
                        <th>ID Paket</th>
                        <th>Nama Paket</th>
                        <th>Harga</th>

                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($datapaket->result_array() as $d) { ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?php echo $d['id_paket'] ?></td>
                                <td><?php echo $d['nama_paket'] ?></td>
                                <td><?php echo $d['harga_paket'] ?></td>

                                <td class="text-center" width="100px">
                                    <a href="javascript:void(0)" onclick="edit( '<?php echo $d['id_paket'] ?>',
                                                                                '<?php echo $d['nama_paket'] ?>', 
                                                                                '<?php echo $d['harga_paket'] ?>')">
                                        <i class="fa fa-pencil" style="color: #3c763d"></i>
                                    </a>
                                    <a href="javascript:void(0)" onclick="hapus('<?php echo $d['id_paket'] ?>','<?php echo $d['nama_paket'] ?>')">
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
    function edit(kode, nama, harga_paket) {
        $('#ekode').val(kode);
        $('#enama').val(nama);
        $('#enohp').val(harga_paket);

        $('#edit_data').modal('show');
    }

    function hapus(kode, nama) {
        $('#hkode').val(kode);
        $('#hnama').html(nama);
        $('#hapus_data').modal('show');
    }
</script>

<div class="modal fade" id="modal_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Data paket</h4>
                <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="POST" action="<?php echo site_url('C_paket/add') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama paket</label>
                        <input type="text" name="nama" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Harga Paket</label>
                        <input type="text" name="harga" class="form-control">
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
                <h4 class="modal-title">Data paket</h4>
            </div>
            <form role="form" method="POST" action="<?php echo site_url('C_paket/edit') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama paket</label>
                        <input type="hidden" name="kode" id="ekode" class="form-control">
                        <input type="text" name="nama" id="enama" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Harga Paket</label>
                        <input type="text" name="harga" id="enohp" class="form-control">
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
            <form method="POST" action="<?php echo site_url('C_paket/delete') ?>">
                <div class="modal-body">
                    <input type="hidden" name="kode" id="hkode">
                    Anda yakin hapus data <strong><span id="hnama"></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="icon-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-cross2"></i>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>