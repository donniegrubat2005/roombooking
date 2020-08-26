<template>
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-md-12">
        <div class="row">
          <div class="col-sm-12">
            <div class="row mb-3">
              <div class="col-sm-6">
                <h4 class="float-left">{{ $route.meta.title }}</h4>
              </div>
              <div class="col-sm-6">
                <router-link
                  to="/managefacilities/create"
                  class="btn btn-primary float-left float-sm-right btn-rounded"
                >Create</router-link>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="table-responsive">
              <table ref="table" class="table thead-light table-borderless">
                <thead>
                  <tr>
                    <th scope="col" width="30px">#</th>
                    <th scope="col">Facilities Title</th>
                    <th scope="col">Facilities Description</th>
                    <th scope="col">Image</th>
                    <th scope="col" width="90px">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(manageFacility, item) in manageFacilities"
                    :key="manageFacility.id"
                    class="table-light"
                  >
                    <th scope="row">{{ item + 1 }}</th>
                    <td>{{ manageFacility.facility_title }}</td>
                    <td>{{ manageFacility.facility_desc }}</td>
                    <td>{{ manageFacility.facility_image }}</td>

                    <td>
                      <span>
                        <router-link
                          :to="{
                                                        name: 'edit_manage_facility',
                                                        params: {
                                                            id: manageFacility.id
                                                        }
                                                    }"
                        >
                          <button
                            class="btn btn-secondary"
                            data-toggle="tooltip"
                            data-placement="bottom"
                            title="Edit"
                          >
                            <i class="fas fa-pencil-alt ms-text-primary"></i>
                          </button>
                        </router-link>
                      </span>
                      <span>
                        <button
                          class="btn btn-danger"
                          data-toggle="tooltip"
                          data-placement="bottom"
                          title="Delete"
                        >
                          <i
                            class="far fa-trash-alt ms-text-danger"
                            @click="
                                                            remove(
                                                                item,
                                                                manageFacility.id
                                                            )
                                                        "
                          ></i>
                        </button>
                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      manageFacilities: [],
      error: {},
      dataTable: null,
    };
  },
  methods: {
    getManageFacilities() {
      axios
        .get("/api/managefacilities")
        .then((response) => {
          this.dt = $(this.$refs.table).DataTable();
          setTimeout(() => (this.manageFacilities = response.data));
        })
        .catch((error) => (this.error = error.response.data));
    },

    remove(key, id) {
      axios
        .delete(`/api/managefacilities/${id}`)
        .then(
          (response) => this.manageFacilities.splice(key, 1),
          this.$toastr.success("Deleted Successfully!", "Deleted!")
        )
        .catch((error) => {
          this.error = error.response.data.error;
          this.$toastr.warning(this.error, "Error!");
        });
    },
  },

  mounted() {
    this.getManageFacilities();
    //$("#sellertable").DataTable({});
  },
  watch: {
    manageFacilities(val) {
      this.dt.destroy();
      this.$nextTick(() => {
        this.dt = $(this.$refs.table).DataTable();
      });
    },
  },
};
</script>

<style scoped></style>
