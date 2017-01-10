export function update(item) {
  console.log(item);
  return $.ajax({
    url: `/api/page/${item.id}`,
    method: 'PUT',
    data: {name: item.name, content: item.content, link: `/page/${item.id}`}
  })
}

export function add(content, name = 'new', link = '') {
  return $.post('/api/page', {content, link, name})
}

export function get(id) {
  if (id) return $.get(`/api/page/${id}`);
  return $.get(`/api/page/0`);
}

export function getPageList() {
  return $.getJSON('/api/page');
}

export function deletePage(id) {
  return $.ajax({
    method: 'DELETE',
    url: '/api/page/' + id
  })
}