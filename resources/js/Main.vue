<template>
  <div>

  	<app-header />
		<div class="min-h-screen">
			<Index />
		</div>
  	<app-footer />

  </div>

</template>

<script>
import AppHeader from "./components/Layouts/Header";
import AppFooter from "./components/Layouts/Footer";
import Index from "./pages/index";
export default {
	components: {AppHeader, AppFooter, Index}
}
</script>

<style>

</style>