import React from 'react'
import HeaderFormFilters from './components/HeaderFormFilters'
import HeaderList from './components/HeaderList'
import HeaderListItem from './components/HeaderListItem'
import Logo from '../Logo'
import Headerlinks from './components/Headerlinks'
import HeaderActions from './components/HeaderActions'

function Header() {
  return (
    <header>
      <HeaderList>
        <HeaderListItem>
          <Logo src='/logo.png' />
        </HeaderListItem>

        <HeaderListItem>
          <Headerlinks />
        </HeaderListItem>

        <HeaderListItem>
          <HeaderFormFilters />
        </HeaderListItem>

        <HeaderListItem>
          <HeaderActions />
        </HeaderListItem>
      </HeaderList>
    </header>
  )
}

export default Header