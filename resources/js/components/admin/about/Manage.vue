<template>
    <div class="page-content">
        <!--breadcrumb-->
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
                <div v-if="$about">
                    <router-link class="btn btn-outline-info px-5 radius-30 mb-3" to="/edit-about">
                        <i class="bx bx-plus"></i> Edit About</router-link>
                </div>
                <div v-else>
                    <router-link class="btn btn-outline-info px-5 radius-30 mb-3" to="/add-about">
                        <i class="bx bx-plus"></i> Add About</router-link>
                </div>

            </div>
        </div>

        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">

                    <thead>
                    <tr>
                        <th class="text-center">About Us</th>

                    </tr>
                    </thead>
                    <tbody>
                    <div v-if="$about">
                    <tr>
                        <td><p>{!! $about->about !!}</p></td>

                    </tr>
                    </div>
                    <div v-else>
                    <h6 class="text-center">No About Article Found.</h6>
                    </div>
                    </tbody>

                </table>

            </div>
        </div>

    </div>
</template>

<script>


export default {

}

</script>
