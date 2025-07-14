import React from 'react'
import styles from './MenuList.module.css'

function MenuList({children}: React.HTMLAttributes<HTMLUListElement>) {
  return (
    <nav>
        <ul className={styles.navegacao}>
            {children}
        </ul>
    </nav>
  )
}

export default MenuList