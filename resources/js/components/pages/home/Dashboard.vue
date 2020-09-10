<template>
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                <h5>
                  <router-link to="/books/list" tag="h5">Books</router-link>
                </h5>
              </div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">This is a book page</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-book fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                <router-link to="/profile/list" tag="h5">Profile</router-link>
              </div>
              <div class="h6 mb-0 font-weight-bold text-gray-800">This is profile page</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
h5 a {
  text-decoration: none;
}
h5:hover,
li:active {
  background-color: none;
  cursor: pointer;
}
</style>
