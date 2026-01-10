<h4 class="mb-3">Kelola User</h4>

<table class="table table-bordered table-striped">
<thead>
<tr>
    <th>No</th>
    <th>nama_pengguna</th>
    <th>kata_sandi</th>
    <th>Email</th>
    <th>dibuat_pada</th>
</tr>
</thead>
<tbody>
<?php $no=1; foreach($users as $u): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= htmlspecialchars($u['nama_pengguna']) ?></td>
    <td><?= $u['kata_sandi'] ?></td>
    <td><?= $u['email'] ?></td>
    <td><?= $u['dibuat_pada'] ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
