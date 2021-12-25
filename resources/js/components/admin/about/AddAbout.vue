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
            <div class="col-md-8"></div>
            <div class="col-md-4">

                    <router-link class="btn btn-outline-info px-5 radius-30 mb-3" to="/manage-about">
                        <i class="bx bxs-eyedropper"></i> Show About Article</router-link>


            </div>
        </div>

        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">

                <!--@submit.prevent="createPost"-->
                <form  method="POST">
                    <div class="mb-3">
                        <label >About Description</label>
                        <textarea class="form-control" name="about" rows="10"></textarea>
                        <!--<form-error v-if="errors.about" :errors="errors">-->
                        <!--@{{ errors.about }}-->
                        <!--</form-error>-->
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail">Photo <span class="text-danger">*</span></label>
                        <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                            <input id="thumbnail" class="form-control" type="text" name="photo">
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        <!--                                    <form-error v-if="errors.photo" :errors="errors">-->
                        <!--                                        @{{ errors.photo }}-->
                        <!--                                    </form-error>-->
                    </div>


            <!-- /.card-body -->
            <div class="row">
                <div class="col-12">
                    <router-link to="#" class="btn btn-secondary">Cancel</router-link>
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </div>
                </form>
            </div>
        </div>

    </div>



</template>

<script>
export default {
    name: "AddAbout"
}
</script>

<style scoped>

</style>
