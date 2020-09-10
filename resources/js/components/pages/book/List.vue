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
                  to="/books/create"
                  class="btn btn-primary float-left float-sm-right btn-rounded"
                >Create Book</router-link>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="table-responsive">
              <table ref="table" class="table thead-light table-borderless">
                <thead>
                  <tr>
                    <th scope="col" width="30px">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Author</th>
                    <th scope="col" width="90px">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(book, item) in books" :key="book.id" class="table-light">
                    <th scope="row">{{ item + 1 }}</th>
                    <td>{{ book.title }}</td>
                    <td>{{ book.description }}</td>
                    <td>{{ book.author }}</td>

                    <td>
                      <span>
                        <router-link
                          :to="{
                                                        name: 'editbook',
                                                        params: {
                                                            id: book.id
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
                                                                book.id
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
      books: [],
      error: {},
      dataTable: null,
    };
  },
  methods: {
    getBooks() {
      axios
        .get("/api/books")
        .then((response) => {
          this.dt = $(this.$refs.table).DataTable();
          setTimeout(() => (this.books = response.data));
        })
        .catch((error) => (this.error = error.response.data));
    },

    remove(key, id) {
      axios
        .delete(`/api/books/${id}`)
        .then(
          (response) => this.books.splice(key, 1),
          this.$toastr.success("Deleted Successfully!", "Deleted!")
        )
        .catch((error) => {
          this.error = error.response.data.error;
          this.$toastr.warning(this.error, "Error!");
        });
    },
  },

  mounted() {
    this.getBooks();
  },
  watch: {
    books(val) {
      this.dt.destroy();
      this.$nextTick(() => {
        this.dt = $(this.$refs.table).DataTable();
      });
    },
  },
};
</script>

<style scoped></style>
