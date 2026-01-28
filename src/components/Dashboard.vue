<template>
  <div>
    <h3>Dashboard</h3>
    <canvas id="chart-members"></canvas>
    <canvas id="chart-finances"></canvas>
  </div>
</template>

<script>
import { onMounted } from 'vue'
// Chart.js expected to be available in the real build
export default {
  name: 'Dashboard',
  setup() {
    onMounted(async () => {
      try {
        const m = await fetch('/index.php/apps/clubsuite-stats/members');
        const fm = await m.json();
        // render members chart (placeholder)
        const ctx = document.getElementById('chart-members');
        if (ctx && window.Chart) {
          new window.Chart(ctx.getContext('2d'), { type: 'line', data: { labels: fm.labels, datasets: [{ label: 'Members', data: fm.data }] } });
        }

        const f = await fetch('/index.php/apps/clubsuite-stats/finances');
        const ff = await f.json();
        const ctx2 = document.getElementById('chart-finances');
        if (ctx2 && window.Chart) {
          new window.Chart(ctx2.getContext('2d'), { type: 'bar', data: { labels: ff.labels, datasets: [{ label: 'Income', data: ff.income }, { label: 'Expense', data: ff.expense }] } });
        }
      } catch (e) { console.warn('statistik fetch failed', e); }
    })
  }
}
</script>
