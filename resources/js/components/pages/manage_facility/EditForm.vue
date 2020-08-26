<template>
  <div class="row">
    <div class="col-xl-12 col-md-12">
      <div class="container-fluid">
        <div class="card rounded-0">
          <div class="card-header">
            <div class="card-title">
              <span class="page-title">
                <h5>{{ $route.meta.title }}</h5>
              </span>
              <span class="back-button">
                <button class="btn btn-default rounded-0" @click.prevent="returntoList()">
                  <i class="fas fa-arrow-left">Back</i>
                </button>
              </span>
            </div>
          </div>
          <div class="card-body">
            <form>
              <div class="form-group">
                <label for="facilitytitle">Facility Title</label>
                <input
                  type="text"
                  name="facilitytitle"
                  v-model="manageFacility.facility_title"
                  class="form-control rounded-0"
                />
              </div>
              <div class="form-group">
                <label for="facilitydesc">Facility Description</label>
                <textarea
                  name="facilitydesc"
                  v-model="manageFacility.facility_desc"
                  class="form-control rounded-0"
                  rows="4"
                />
              </div>
              <div class="form-group">
                <label for="facilitytitle">Facility Image</label>
                <input
                  type="text"
                  name="facilitytitle"
                  v-model="manageFacility.facility_image"
                  class="form-control rounded-0"
                />
              </div>

              <button
                class="btn btn-primary float-left float-sm-left btn-rounded"
                type="button"
                @click.prevent="update()"
              >Save</button>
            </form>
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
      manageFacility: {},
      error: {},
    };
  },
  methods: {
    update() {
      let uri = "/api/managefacilities/" + this.$route.params.id;
      axios
        .patch(uri, this.manageFacility)
        .then((response) => {
          this.contact = response.data;
          this.$toastr.success("Updated Successfully!", "Updated!");
          this.returntoList();
        })
        .catch((error) => {
          this.error = error.response.data.error;
          this.$toastr.warning(this.error, "Error!");
        });
    },

    returntoList() {
      this.$router.push({ name: "managefacilitylist" });
    },
  },

  created() {
    let uri = "/api/managefacilities/" + this.$route.params.id + "/edit";
    axios
      .get(uri)
      .then((response) => {
        this.manageFacility = response.data;
      })
      .catch((error) => (this.errors = error.response.data.errors));
  },
};
</script>

<style></style>
