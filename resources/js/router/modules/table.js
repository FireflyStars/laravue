import Layout from '@/layout';

const tableRoutes = {
  path: '/suppliers',
  component: Layout,
  redirect: '/views/suppliers',
  name: 'Suppliers',
  meta: {
    title: 'Proveedores',
    icon: 'list',
  },
  children: [
    {
      path: 'suppliers',
      component: () => import('@/views/suppliers/suppliers'),
      name: 'Suppliers List',
      meta: { title: 'Suppliers ', icon: 'list' },
    },
    {
      path: 'drag-table',
      component: () => import('@/views/table/DragTable'),
      name: 'DragTable',
      hidden: true,
      meta: { title: 'dragTable' },
    },
    {
      path: 'inline-edit-table',
      component: () => import('@/views/table/InlineEditTable'),
      name: 'InlineEditTable',
      hidden: true,
      meta: { title: 'inlineEditTable' },
    },
    {
      path: 'tree-table',
      component: () => import('@/views/table/TreeTable/TreeTable'),
      name: 'TreeTableDemo',
      hidden: true,
      meta: { title: 'treeTable' },
    },
    {
      path: 'custom-tree-table',
      component: () => import('@/views/table/TreeTable/CustomTreeTable'),
      name: 'CustomTreeTableDemo',
      hidden: true,
      meta: { title: 'customTreeTable' },
    },
    {
      path: 'complex-table',
      component: () => import('@/views/table/ComplexTable'),
      name: 'ComplexTable',
      hidden: true,
      meta: { title: 'complexTable' },
    },
  ],
};
export default tableRoutes;
