<script setup>
defineProps({
  empleados: Array
})
</script>

<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Lista de Empleados</h1>
    <table class="table-auto w-full border">
      <thead>
        <tr class="bg-gray-200 text-black text-2xl">
          <th class="border px-4 py-2">Nombre</th>
          <th class="border px-4 py-2">Tipo</th>
          <th class="border px-4 py-2">Salario Base</th>
          <th class="border px-4 py-2">Salario Final</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="empleado in empleados" :key="empleado.id">
          <td class="border px-4 py-2">{{ empleado.nombre }}</td>
          <td class="border px-4 py-2">{{ empleado.tipo.replace('_', ' ') }}</td>
          <td class="border px-4 py-2">S/ {{ empleado.salario_base }}</td>
          <td class="border px-4 py-2">S/ {{ empleado.salario_final }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
