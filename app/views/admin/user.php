<h4 class="mb-3">Kelola User</h4>

<table class="table table-bordered table-striped">
<thead>
<tr>
    <th>No</th>
    <th>Username</th>
    <th>NISN</th>
    <th>Email</th>
    <th>Role</th>
    <th>Tanggal Daftar</th>
</tr>
</thead>
<tbody>
<?php $no=1; foreach($users as $u): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= htmlspecialchars($u['username']) ?></td>
    <td><?= $u['nisn'] ?></td>
    <td><?= $u['email'] ?></td>
    <td><?= ucfirst($u['role']) ?></td>
    <td><?= $u['created_at'] ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
