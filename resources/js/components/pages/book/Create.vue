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
                <label for="title">Title</label>
                <input type="text" name="title" v-model="book.title" class="form-control rounded-0" />
              </div>

              <div class="form-group">
                <label for="description">Description</label>
                <input
                  type="text"
                  name="description"
                  v-model="book.description"
                  class="form-control rounded-0"
                />
              </div>

              <div class="form-group">
                <label for="author">Author</label>
                <input
                  type="text"
                  name="author"
                  v-model="book.author"
                  class="form-control rounded-0"
                />
              </div>

              <button
                class="btn btn-primary float-left float-sm-left btn-rounded"
                type="button"
                @click.prevent="create()"
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
      book: {
        id: "",
        title: "",
        description: "",
        author: "",
      },
      error: {},
    };
  },
  methods: {
    create() {
      axios
        .post("/api/books", this.$data.book)
        .then((response) => {
          this.$toastr.success("Save Successfully!", "Saved!");
          this.returntoList();
        })
        .catch((error) => {
          (this.error = error.response.data.error),
            this.$toastr.warning(this.error, "Error!");
        });
    },

    returntoList() {
      this.$router.push({ name: "booklist" });
    },
  },
};
</script>

<style></style>
