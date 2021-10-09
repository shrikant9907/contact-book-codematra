<div class="admin-sidebar bg-white d-flex flex-column flex-shrink-0 p-3 shadow vh-100">
  <a href="dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
    <span class="fs-4">Admin Dashboard</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item"><a href="index.php" class="nav-link link-dark">Home</a></li>
    <li><a href="dashboard.php" class="nav-link link-dark">Dashboard</a></li>
    <li class="mb-1">
      <button class="nav-link link-dark dropdown-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#contacts-collapse" aria-expanded="false">
        Contacts
      </button>
      <div class="collapse" id="contacts-collapse">
        <ul class="list-unstyled list-group">
          <li><a href="contacts.php" class="list-group-item border-0 link-dark text-decoration-none rounded">All Contacts</a></li>
          <li><a href="add-contact.php" class="list-group-item border-0 link-dark text-decoration-none rounded">Add New Contact</a></li>
        </ul>
      </div>
    </li>
  </ul>
</div>