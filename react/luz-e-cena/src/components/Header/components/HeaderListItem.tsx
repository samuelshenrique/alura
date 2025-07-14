import React from 'react'

function HeaderListItem({children}: React.HTMLAttributes<HTMLLIElement>) {
  return (
    <li>{children}</li>
  )
}

export default HeaderListItem