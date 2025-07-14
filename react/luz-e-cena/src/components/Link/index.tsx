import styles from './Link.module.css';

function Link({children, ...rest}: React.AnchorHTMLAttributes<HTMLAnchorElement>) {
  return (
    <a className={styles.link} {...rest}>
        {children}
    </a>
  )
}

export default Link