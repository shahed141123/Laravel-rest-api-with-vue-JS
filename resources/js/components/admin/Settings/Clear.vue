<template>
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin Section</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Website Settings </li>

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

        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <table id="example1" class="table table-bordered table-striped">

                        <thead>
                        <tr>
                            <th class="text-center" style="width: 70%">Settings</th>
                            <th class="text-center">Click this Button</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>Link Storage</td>
                            <td><a href="" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%"  title="click" ><i class="bx bx-bullseye"></i></a></td>
                        </tr>
                        <tr>
                            <td> CACHE Clear</td>
                            <td><a href="" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%"  title="click" ><i class="bx bx-bullseye"></i></a></td>
                        </tr>
                        <tr>
                            <td> Route Clear</td>
                            <td><a href="" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%"  title="click" ><i class="bx bx-bullseye"></i></a></td>
                        </tr>
                        <tr>
                            <td>Optimize</td>
                            <td><a href="" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%"  title="click" ><i class="bx bx-bullseye"></i></a></td>
                        </tr>
                        <tr>
                            <td>Route Cache</td>
                            <td><a href="" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%"  title="click" ><i class="bx bx-bullseye"></i></a></td>
                        </tr>
                        <tr>
                            <td>View Clear</td>
                            <td><a href="" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%"  title="click" ><i class="bx bx-bullseye"></i></a></td>
                        </tr>
                        <tr>
                            <td>Config Clear</td>
                            <td><a href="" class="btn btn-primary btn-sm float-left mr-1 mb-2" style="height:30px; width:30px;border-radius:50%"  title="click" ><i class="bx bx-bullseye"></i></a></td>
                        </tr>

                        </tbody>

                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "Clear"
}
</script>

<style scoped>

</style>
