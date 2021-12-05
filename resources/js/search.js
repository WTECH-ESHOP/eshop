import autocomplete from 'autocompleter'

const input = document.getElementById('search')

// TODO: search

if (!!input)
  autocomplete({
    input,
    emptyMsg: 'No products found...',
    showOnFocus: true,
    minLength: 1,
    debounceWaitMs: 100,
    disableAutoSelect: true,
    fetch: (query, update) =>
      fetch(`/search?query=${query}`)
        .then((res) => res.json())
        .catch(() => console.error('search error'))
        .then((data) => update(data)),
    render: (item) => {
      const a = document.createElement('a')
      a.href = `/${item?.subcategory?.category?.name}/${item?.id}`

      const img = document.createElement('img')
      img.src = item?.images?.[0]
      a.appendChild(img)

      const p = document.createElement('p')
      p.innerText = item?.name

      const span = document.createElement('span')
      span.innerText = `from ${(+item?.variant?.price)?.toFixed(2)}€`

      const div = document.createElement('div')
      div.appendChild(p)
      div.appendChild(span)

      a.appendChild(div)
      return a
    },
  })
