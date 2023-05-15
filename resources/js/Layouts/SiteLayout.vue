<script setup>
import { Link } from '@inertiajs/vue3'

</script>

<template>
  <header>
    <div class="sm:flex sm:justify-center sm:items-center bg-center bg-gray-100 dark:bg-gray-900 selection:bg-red-500 selection:text-white">
      <div v-if="$page.props.auth.canLogin" class="p-6 text-right">
          <Link
              v-if="$page.props.auth.user"
              :href="route('dashboard')"
              class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
              >Dashboard</Link
          >

          <template v-else>
              <Link
                  :href="route('login')"
                  class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                  >Log in</Link
              >

              <Link
                  v-if="$page.props.auth.canRegister"
                  :href="route('register')"
                  class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                  >Register</Link
              >
          </template>
      </div>
    </div>    
  </header>
  <main>
    <slot />
  </main>
</template>
