<div class="box-body">
              <table id="example1" class="table table-bordered table-hover anggota">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nim</th>                  
                  <th>ID Anggota</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Jurusan</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                    <tbody>
                     <?php 
                        $no=1;
                        foreach($anggota as $ang): ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $ang->nim;?></td>
                        <td><?php echo $ang->id_card;?></td>
                        <td><?php echo $ang->nama;?></td>
                        <td><?php echo $ang->kelas;?></td>
                        <td><?php echo $ang->kode_jurusan;?></td>
                        <td><?php echo $ang->ket;?></td>
                        <td>
                          <a href="<?php echo base_url('admin/anggota/detail_anggota/'.$ang->id_anggota);?>"><button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button></a>
                          <a href="<?php echo base_url('admin/anggota/edit_anggota/'.$ang->id_anggota);?>"><button type="button" class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
                          <a href="<?php echo base_url('admin/anggota/kartu_anggota/'.$ang->id_anggota);?>"><button type="button" class="btn btn-warning"><i class="fa fa-barcode"></i></button></a>
                          <a href="<?php echo base_url('admin/anggota/delete_anggota/'.$ang->id_anggota);?>"><button type="button" class="btn btn-danger" onClick="return confirm('Apakah anda yakin ingin menghapus data ini.?')"><i class="fa fa-trash"></i></button>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
              </table>
            </div>
            <!-- /.box-body -->