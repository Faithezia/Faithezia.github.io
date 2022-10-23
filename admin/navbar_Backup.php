<div class="btn-group">
                      <button type="button" class="btn btn-secondary dropdown-toggle <?= ($activePage == 'books') ? 'active':''; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cataloging
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item <?= ($activePage == 'books') ? 'active':''; ?>" href="books.php" style="font-size: 1.1em;">Books</a>
                      </div>
                    </div>
                   
                   <div class="btn-group">
                      <button type="button" class="btn btn-secondary dropdown-toggle <?= ($activePage == 'user_information') ? 'active':''; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        User Management
                      </button>
                      <div class="dropdown-menu">
                       <a class="dropdown-item <?= ($activePage == 'user_information') ? 'active':''; ?>" href="user_information.php" style="font-size: 1.1em;">User Information</a>
                      </div>
                    </div>

                    <div class="btn-group">
                      <button type="button" class="btn btn-secondary dropdown-toggle <?= ($activePage == 'request' OR $activePage == 'charge' OR $activePage == 'record') ? 'active':''; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Circulation
                      </button>
                      <div class="dropdown-menu">
                       <a class="dropdown-item <?= ($activePage == 'request') ? 'active':''; ?>" href="request.php" style="font-size: 1.1em;">Request</a>
                       <a class="dropdown-item <?= ($activePage == 'charge') ? 'active':''; ?>" href="charge.php" style="font-size: 1.1em;">Charges</a>
                       <a class="dropdown-item <?= ($activePage == 'record') ? 'active':''; ?>" href="record.php" style="font-size: 1.1em;">Records</a>
                      </div>
                    </div>

                    <div class="btn-group">
                      <button type="button" class="btn btn-secondary dropdown-toggle <?= ($activePage == 'add') ? 'active':''; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Acquisition
                      </button>
                      <div class="dropdown-menu">
                       <a class="dropdown-item <?= ($activePage == 'add') ? 'active':''; ?>" href="add.php" style="font-size: 1.1em;">Book Acquisition</a>
                      </div>
                    </div>
