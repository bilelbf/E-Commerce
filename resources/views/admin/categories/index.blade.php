@extends('admin/layout.master')
@section('content')
                   

 
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">categorie</h1>

                    <a class="btn btn-primary btn-icon-split" href="#" data-toggle="modal"
                        data-target="#ajoutcategorieModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">{{__('messages.Ajouter un Catégorie')}}</span>
                    </a>
                    <hr class="sidebar-divider d-none d-md-block">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <center>
                            <div class="card-header py-4">
                                <h6 class="m-0 font-weight-bold text-primary">{{__('messages.Liste des Catégories')}}</h6>
                            </div>
                        </center>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Nom de Catégorie</th>
                                            <th>Déscription</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>N°</th>
                                            <th>Nom de Catégorie</th>
                                            <th>Déscription</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        @foreach ($categories as $index => $c)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $c->name }}</td>
                                                <td>{{ $c->description }}</td>
                                                <td>
                                                    <a  class="btn btn-success" data-target="#editcategorieModal{{ $c->id }}" href="#" data-toggle="modal">
                                                        {{__('messages.Modifier')}}</a>

                                                    <a onclick="return confirm('Voulez vous supprimer cette enregistement? ')"
                                                        href="/admin/categorie/{{ $c->id }}/deletecategorie"
                                                        class="btn btn-danger  ">
                                                        {{__('messages.Supprimer')}}</a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
 

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

    <!-- add Category Modal-->
    <div class="modal fade" id="ajoutcategorieModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un catégorie</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="user" action="/admin/addcategorie" method="POST">
                        @csrf
                        <div class="form-group">

                            <input type="text" class="form-control form-control-user" id="exampleFirstName" name="name"
                                placeholder="Nom catégorie" required>

                            <textarea type="text" class="form-control form-control-user" id="exampleInputEmail" name="description"
                                placeholder="Déscription" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit"> Ajouter </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- modifier Category Modal-->
@foreach ( $categories as $index => $c)


  <div class="modal fade" id="editcategorieModal{{ $c->id }}" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modifier catégorie: {{ $c->name }}</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">

              <form class="user" action="/admin/categorie/editcategorie" method="POST">
                  @csrf
                  <div class="form-group">

                      <input type="text" class="form-control form-control-user" id="exampleFirstName" name="name"
                          placeholder="Nom catégorie" value="{{ $c-> name}}"required>

                      <textarea type="text" class="form-control form-control-user" id="exampleInputEmail" name="description"
                          placeholder="Déscription" required>{{ $c->description }}</textarea>
                  </div>
                  <input type="hidden" value="{{ $c->id }}" name="idcategorie">
                  <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                      <button class="btn btn-primary" type="submit"> Modifier</button>

                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

@endforeach

@stop