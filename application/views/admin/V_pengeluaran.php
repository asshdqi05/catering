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
                        <th>ID pengeluaran</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($datapengeluaran->result_array() as $d) { ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?php echo $d['id_pengeluaran'] ?></td>
                                <td><?php echo $d['tanggal'] ?></td>
                                <td><?php echo $d['jumlah'] ?></td>
                                <td><?php echo $d['keterangan'] ?></td>
                                <td class="text-center" width="100px">
                                    <a href="javascript:void(0)" onclick="edit( '<?php echo $d['id_pengeluaran'] ?>',
                                                                                '<?php echo $d['tanggal'] ?>',
                                                                                '<?php echo $d['jumlah'] ?>',                                                                                 
                                                                                '<?php echo $d['keterangan'] ?>')">
                                        <i class="fa fa-pencil" style="color: #3c763d"></i>
                                    </a>
                                    <a href="javascript:void(0)" onclick="hapus('<?php echo $d['id_pengeluaran'] ?>','<?php echo $d['keterangan'] ?>')">
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
    function edit(kode, tanggal, jumlah, keterangan) {
        $('#ekode').val(kode);
        $('#etanggal').val(tanggal);
        $('#ejumlah').val(jumlah);
        $('#eketerangan').val(keterangan);
        $('#edit_data').modal('show');
    }

    function hapus(kode, keterangan) {
        $('#hkode').val(kode);
        $('#hketerangan').html(keterangan);
        $('#hapus_data').modal('show');
    }
</script>

<div class="modal fade" id="modal_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Data pengeluaran</h4>
                <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="POST" action="<?php echo site_url('C_pengeluaran/add') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>jumlah</label>
                        <input type="text" name="jumlah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>keterangan</label>
                        <textarea name="keterangan" class="form-control"></textarea>

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
                <h4 class="modal-title">Data pengeluaran</h4>
            </div>
            <form role="form" method="POST" action="<?php echo site_url('C_pengeluaran/edit') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama pengeluaran</label>
                        <input type="hidden" name="kode" id="ekode" class="form-control">
                        <input type="date" name="tanggal" id="etanggal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>jumlah</label>
                        <input type="text" name="jumlah" id="ejumlah" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>keterangan</label>
                        <textarea name="keterangan" id="eketerangan" class="form-control"></textarea>
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
            <form method="POST" action="<?php echo site_url('C_pengeluaran/delete') ?>">
                <div class="modal-body">
                    <input type="hidden" name="kode" id="hkode">
                    Anda yakin hapus data <strong><span id="hketerangan"></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="icon-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-cross2"></i>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>