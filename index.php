<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Application Using PHP OOPS PDO MySQL & FETCH API of ES6</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<!-- Navbar -->
<header>
      <nav class="navbar navbar-expand-md navbar-primary fixed-top bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="#">WalletPet</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="">Meus Pets</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <br>
    <br>
      <!-- Navbar End -->
      <style>
        body {
          background-image: url('assets/images/back.jpg');
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-size: 100% 100%;
        }
      </style>
  <!-- Add New User Modal Start -->
  <div class="modal fade" tabindex="-1" id="addNewUserModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicionar novo PET</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="add-user-form" class="p-2" novalidate>
            <div class="row mb-3 gx-3">
              <div class="col">
                <input type="text" name="fname" class="form-control form-control-lg" placeholder="Nome" required>
                <div class="invalid-feedback">Nome é obrigatório!</div>
              </div>

              <div class="col">
                <input type="text" name="lname" class="form-control form-control-lg" placeholder="Raça" required>
                <div class="invalid-feedback">Raça é obrigatório!</div>
              </div>
            </div>

            <div class="mb-3">
              <input type="email" name="email" class="form-control form-control-lg" placeholder="E-mail do Proprietário" required>
              <div class="invalid-feedback">E-mail é obrigatório!</div>
            </div>

            <div class="mb-3">
              <input type="tel" name="phone" class="form-control form-control-lg" placeholder="Telefone do Proprietário" required>
              <div class="invalid-feedback">Telefone é obrigatório!</div>
            </div>

            <div class="mb-3">
              <input type="submit" value="Adicionar PET" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Add New User Modal End -->

  <!-- Edit User Modal Start -->
  <div class="modal fade" tabindex="-1" id="editUserModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar PET</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="edit-user-form" class="p-2" novalidate>
            <input type="hidden" name="id" id="id">
            <div class="row mb-3 gx-3">
              <div class="col">
                <input type="text" name="fname" id="fname" class="form-control form-control-lg" placeholder="Enter First Name" required>
                <div class="invalid-feedback">Nome é obrigatório!</div>
              </div>

              <div class="col">
                <input type="text" name="lname" id="lname" class="form-control form-control-lg" placeholder="Enter Last Name" required>
                <div class="invalid-feedback">O Ultimo nome é obrigatório!</div>
              </div>
            </div>

            <div class="mb-3">
              <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter E-mail" required>
              <div class="invalid-feedback">O E-mail é obrigatório!</div>
            </div>

            <div class="mb-3">
              <input type="tel" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter Phone" required>
              <div class="invalid-feedback">Telefone é obrigatório!</div>
            </div>

            <div class="mb-3">
              <input type="submit" value="Atualizar PET" class="btn btn-primary btn-block btn-lg" id="edit-user-btn">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Edit User Modal End -->
  <div class="container">
    <div class="row mt-4">
      <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <div>
          <h4 class="text-white">Pets Cadastrados</h4>
        </div>
        <div>
          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewUserModal">Adicionar novo PET</button>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-12">
        <div id="showAlert"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">
          <table class="table table-striped table-bordered text-center text-white table-dark">
            <thead>
              <tr>
                <th>Pet</th>
                <th>Nome</th>
                <th>Raça</th>
                <th>E-mail do Proprietário</th>
                <th>Telefone do Proprietário</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="main.js"></script>

  <!-- FOOTER -->
  
    
  <div class="container mt-auto">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <p class="col-md-2 mb-0 text-white">&copy; CardPET</p>
  
      <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      </a>
  
      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="home.html" class="nav-link px-2 text-white">Home</a></li>
        <li class="nav-item"><a href="" class="nav-link px-2 text-white">Meus Pets</a></li>
      </ul>
    </footer>
  </div>
<!-- FOOTER END-->

</body>

</html>