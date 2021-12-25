<template>
    <div class="page-content">
        <!-- Content Header (Page header) -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin Section</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><router-link to="/"><i class="bx bx-home-alt"></i></router-link>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Home Page Link Section</li>

                    </ol>

                </nav>
            </div>

        </div>
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3">

                <router-link class="btn btn-outline-info px-5 radius-30 mb-3" to="/">
                    <i class="bx bx-plus"></i> Dashboard</router-link>


            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header bg-dark" >
                                <h5 class="card-title text-center" style="float: none">Manage Your Website Settings</h5>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <section class="content">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="card card-success">
                                                <div class="card-header">
                                                    <h5 class="card-title">Website Name</h5>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <label > Name First Line</label>
                                                        <input type="text" readonly  class="form-control" value="">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label > Name Second Line</label>
                                                        <input type="text" readonly class="form-control" value="">
                                                    </div>
                                                    <div class="timeline-footer text-right">
                                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-name">Update</a>

                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h5 class="card-title">Website Address</h5>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <label>Address</label>
                                                        <textarea class="form-control" rows="3" placeholder="Enter ..." readonly></textarea>
                                                    </div>

                                                    <div class="mb-4">
                                                        <label >Email</label>
                                                        <input type="text" readonly  class="form-control" value="">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label >Phone No:</label>
                                                        <input type="text" readonly  class="form-control" value="">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="">Contact Hour</label>
                                                        <input type="text" readonly id="" class="form-control" value="">
                                                    </div>
                                                    <div class="timeline-footer text-right">
                                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-address">Update</a>

                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="card card-warning">
                                                <div class="card-header">
                                                    <h5 class="card-title">Website Logo</h5>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-body box-profile">
                                                        <div class="text-center">
                                                            <img class="profile-user-img img-fluid img-circle" src="" alt="Website Logo" width="120px" height="120px"/>
                                                        </div>

                                                        <h5 class="profile-username text-center">Logo</h5>
                                                    </div>
                                                    <div class="timeline-footer text-right">
                                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-logo">Update</a>

                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h5 class="card-title">Website Favicon</h5>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-body box-profile">
                                                        <div class="text-center">
                                                            <img class="profile-user-img img-fluid img-circle" src="" alt="Website Favicon Icon" width="120px" height="120px"/>
                                                        </div>

                                                        <h5 class="profile-username text-center">Favicon Icon</h5>
                                                    </div>
                                                    <div class="timeline-footer text-right">
                                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-favicon">Update</a>

                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="card card-success">
                                                <div class="card-header">
                                                    <h5 class="card-title">Social Links</h5>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <label >Facebook Url</label>
                                                        <input type="text" readonly  class="form-control" value="">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label >Twitter Url</label>
                                                        <input type="text" readonly class="form-control" value="">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label>Linked In Url</label>
                                                        <input type="text" readonly class="form-control" value="">
                                                    </div>
                                                    <div class="timeline-footer text-right">
                                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-social">Update</a>

                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>

                                        </div>


                                    </div>
                                </section>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->



                        <!-- /.card-body -->





                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->


    </div>
</template>

<script>
export default {
    name: "Settings"
}
</script>

<style scoped>

</style>
