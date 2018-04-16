<div class="col-sm-8 text-left" id="centre">

    <div id="audit">
        <h1>Audit trails</h1>

        <table class="table  table-responsive table-sm table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Datetime</th>
              <th scope="col">Type</th>
              <th scope="col">User</th>
              <th scope="col">Message</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($trail as $entries): ?>
                <tr>
                  <th scope="row"><?php echo $entries['id']; ?></th>
                  <td><?php echo $entries['datetime']; ?></td>
                  <td><?php echo $entries['logType']; ?></td>
                  <td><?php echo $entries['userResponsible']; ?></td>
                  <td><?php echo $entries['logMessage']; ?></td>
                </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
    </div>

</div>
